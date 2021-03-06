<?php

namespace App\Repositories;

use App\Models\Event;
use App\Models\EventType;
use App\Models\CalendarOption;
use App\Transformers\EventTransformer;
use App\Repositories\CalendarOptionRepository;
use App\Repositories\UserRepository;
class EventRepository
{
    use BaseRepository;

    /**
     * Event Model
     *
     * @var Event
     */
    protected $model;

    /**
     * Constructor
     *
     * @param Event $Event
     */
    public function __construct(Event $Event, EventTransformer $eventTrans, CalendarOptionRepository $calendarOption, UserRepository $user)
    {
        $this->model = $Event;
        $this->trans = $eventTrans;
        $this->calendarOption = $calendarOption;
        $this->user = $user;
    }

    /**
     * Get number of the records
     *
     * @param  Request $request
     * @param  int $number
     * @param  string $sort
     * @param  string $sortColumn
     * @return Paginate
     */
     
    
    public function pageWithRequest($request, $number = 10, $sort = 'desc', $sortColumn = 'created_at'){
        $keyword = $request->get('keyword');

        if ($request->has('limit')) {
            $number = $request->get('limit');
        }

        return $this->model->when($keyword, function ($query) use ($keyword) {
                    $query->where('title', 'like', "%{$keyword}%")
                          ->orWhere('description', 'like', "%{$keyword}%");
                })
                ->orderBy($sortColumn, $sort)
                ->paginate($number);
    }

 
    public function findByUser($user_id, $offset = 0, $limit = 100){
        $result = Event::select('events.*','events.at as datetime', 'event_types.name as event_type_name')
        ->leftJoin('event_types', 'event_types.id', 'events.type_id')
        ->where('events.user_id', $user_id)
        ->where('events.completed', null)
        ->offset($offset)
        ->limit($limit)
        ->orderBy('events.at', 'DESC')
        ->get();
        return $result;
    }

    public function findByCase($case_id){
        $result = $this->model->where('case_id', $case_id)
            ->where('user_id', auth()->user()->id)
            ->where('completed', null)
            ->get();
        return $result;
    }

    public function findByCompanyID($company_id){
        return Event::leftJoin('cases', 'cases.id', 'events.case_id')
            ->where('cases.company_id', $company_id)
            ->get();
    }

    public function findAllByCase($case_id){

        $result = Event::selectRaw('events.*, CONCAT(u.first_name, " ", u.last_name) as sales_rep_name, event_types.name as event_type_name')
            ->leftJoin('users as u', 'u.id', 'events.user_id')
            ->leftJoin('event_types', 'event_types.id', 'events.type_id')
            ->where('events.case_id', $case_id)
            ->where('events.completed', null)
            ->get();

        return $result;

    }

    public function findByDate($start_date, $end_date = null){
        $start_date = date('Y-m-d', strtotime($start_date));
        if(empty($end_date)){
            $end_date = date('Y-m-d', strtotime($start_date)). ' 23:59:59';
        }else{
            $end_date = date('Y-m-d', strtotime($end_date)). ' 23:59:59';
        }
        $result = $this->model->select('id', 'title', 'description', 'at as start', 'end_time as end', 'case_id', 'at', 'end_time')
            ->where('user_id', 350)
            ->whereBetween('at', [$start_date, $end_date])
            ->where('completed', null)
            ->orderBy('at')
            ->get();
        return $result;
    }

    public function findByUserAndDate($start_date, $end_date = null, $user_id){
        $start_date = date('Y-m-d', strtotime($start_date));
        if(empty($end_date)){
            $end_date = date('Y-m-d', strtotime($start_date)). ' 23:59:59';
        }else{
            $end_date = date('Y-m-d', strtotime($end_date)). ' 23:59:59';
        }
        $result = $this->model->select('at as start', 'end_time as end', 'at', 'end_time')
            ->where('user_id', $user_id)
            ->whereBetween('at', [$start_date, $end_date])
            ->where('completed', 'is', null)
            ->orderBy('at')
            ->get();
        return $result;
    }

    public function findByStatus($status){
        $query = Event::select('events.*', 'events.at as datetime', 'event_types.name as event_type_name')
            ->leftJoin('event_types', 'event_types.id', 'events.type_id')
            ->leftJoin('users as u', 'u.id', 'events.user_id')
            ->where('events.user_id', auth()->user()->id)
            ->orderBy('events.at');
        if($status == 'overdue'){
            $query->where('events.at', '<', date('Y-m-d H:i:s'))
                ->where('events.completed', 'is', null);
        }
        $result = $query->get();
        return $result;
    }

    public function findCountByUserID($user_id){
        $result = Event::selectRaw('count(id) as total_records')
            ->where('user_id', $user_id)
            ->where('completed', null)
            ->first();
        return $result['total_records'];
    }

    public function findCountByCaseId($case_id){
        $result = Event::selectRaw('count(id) as total_records')
            ->where('case_id', $case_id)
            ->where('completed', null)
            ->first();
        if($result){
            return $result['total_records'];
        }
        return 0;
    }

    public function findOverdueCountByUserID($user_id){
        $result = Event::selectRaw('count(id) as total_records')
            ->where('user_id', $user_id)
            ->where('completed', null)
            ->where('at','<',date('Y-m-d H:i:a'))
            ->first()
            ->toArray();
        return $result['total_records'];
    }

    public function update_($id, $data){
        if (isset($data->datetime) && !empty($data->datetime)){
            $data['at'] = date('Y-m-d H:i:s', strtotime($data->datetime));
            unset($data->datetime);
        }
        if (!isset($data['alert_offset'])) {
            $event = Event::find($id);

            if (strtotime($data['at']) >= strtotime($event['at'])) {
                $data["alert_at"] = date('Y-m-d H:i:s', strtotime($event['alert_at']) + (strtotime($data['at']) - strtotime($event['at'])));
            } else {
                $data["alert_at"] = date('Y-m-d H:i:s', strtotime($event['alert_at']) - (strtotime($event['at']) - strtotime($data['at'])));
            }
        }

        if(!empty($data['alert_offset'])){
            $data['alert_at'] = date('Y-m-d H:i:s', strtotime($data['alert_offset'], strtotime($data['at'])));
        }else if(!isset($data['alert_at'])){
            $data['alert_at'] = $data['at'];
        }

        unset($data['alert_offset']);

        if (isset($data->endtime) && !empty($data->endtime)){
            $ts = strtotime($data->endtime);

            if($ts < strtotime($data['at'])){
                throw new Exception('End of event is before Start');
            }

            $data['end_time'] = date('Y-m-d H:i:s', strtotime($data->endtime));
            unset($data->endtime);

        }else if(isset($data->endtime) && empty($data->endtime)){
            unset($data->endtime);
        }

        $result = Event::find($id)->fill($data);
        $result->update();
    }

    public function snoozer(){
        $update = array();
        $update['alert_at'] = $update['at'] = date('Y-m-d H:i:s', strtotime('2020-03-12'));
        $update['popup_triggered'] = 0;
        $update['alert_offset'] = NULL;
        $result =  Event::find($data['appointment_id'])->fill($update);
        $result->update();
        $result->increment('snoozed');
        return $result;
    }
    public function complete($id){
        $result = Event::find($id)->fill(['completed' => date('Y-m-d H:i:s')]);
        $result->update();
    }

    public function add($data){

        if(isset($data->datetime)){
            $ts = strtotime($data->datetime);
            if(!$ts){
                throw new Exception($data->datetime . 'is not a valid date');
            }
            $data['at'] = date('Y-m-d H:i:s', strtotime($data->datetime));
            unset($data->datetime);
        }
        if(isset($data->endtime)){
            $ts = strtotime($data->endtime);
            if(!$ts){
                throw new Exception($data->endtime . 'is not a valid date');
            }
            $data['end_time'] = date('Y-m-d H:i:s', strtotime($data->endtime));
            if($data['end_time'] < $data['at']){
                throw new Exception('End of event is before Start');
            }
            unset($data->endtime);
        }


        if(!empty($data['alert_offset'])){
            $data['alert_at'] = date('Y-m-d H:i:s', strtotime($data['alert_offset'], strtotime($data['at'])));
        }else{
            $data['alert_at'] = $data['at'];
        }

        unset($data['alert_offset']);

        $data['created'] = date('Y-m-d H:i:s');
        $data['created_by'] = auth()->user()->id;
        $result = Event::create($data);
        return current($result);
    }

    public function sendReminderEmails(){
        $result = Event::select('u.email','e.id','e.case_id','e.title','e.description','e.at')->from('events as e')
            ->join('users','u', 'e.user_id', 'u.id')
            ->where('e.alert_email', 1)
            ->where('e.email_sent', 0)
            ->where('e.alert_at', '<=', date('Y-m-d H:i:s'))
            ->get()
            ->toArray();

        if(!count($result)){
            return;
        }
        $case_ids = array();
        $emails = array();
        foreach($result as $a){
            $case_ids[] = $a['case_id'];
        }
        $cases = Model_Case::findByIDs($case_ids);
        foreach($result as $a){

            $c = array('first_name'=>'','last_name'=>'','id'=>'');
            if(!empty($a['case_id']) && isset($cases[$a['case_id']])){
                $c = $cases[$a['case_id']];
            }

            $to = $a['email'];
            $subject = 'Appointment Reminder: '.date('m/d g:ia', strtotime($a['at'])).(!empty($c['first_name'])?' with ':'').$c['first_name'].' '.$c['last_name'];
            $message = $a['title']."\r\n".$a['description']."\r\n";
            if(!empty($c['id'])){
                $message .= 'https://app.datacorecrm.com/case/dashboard/view/'.$c['id'];
            }

            $email_data = array(
                'case_id' => $a['case_id'],
                'direction' => 'outbound',
                'subject' => $subject,
                'body' => $message,
                'created_date' => date('Y-m-d H:i:s'),
                'created_by' => \Model_Account::getUserId(),
                'in_queue' => 1,
                'email_to' => $a['email']

            );

            $email_id = \EmailManager\Model_Emails::add($email_data);
            //Model_Mail::send($to, $subject, $message, null); // TODO

            self::completeReminderEmail($a['id']);

        }

    }

    public function completeReminderEmail($id){
        $result = Event::find($id)->fill(['email_sent' => 1]);
        $result->update();
    }

    public function getPopups(){
        $result = Event::select('e.id', 'e.case_id', 'e.title', 'e.description', 'e.at', 'cc.first_name', 'cc.last_name', 'e.user_id')->from('events sa e')
            ->leftJoin('cases as c', 'e.case_id', 'c.id')
            ->leftJoin('case_contact as cc', 'cc.case_id', 'c.id')
            ->where('e.alert_popup', 1)
            ->where('e.popup_triggered', 0)
            ->where('e.alert_at', '<=', date('Y-m-d H:i:s'))
            ->where('e.user_id', '=', auth()->user()->id)
            ->get()
            ->toArray();

        if (!count($result)) {
            return array();
        }
        $popups = array();
        foreach ($result as $a) {
            if (!empty($a['case_id']) && isset($cases[$a['case_id']])) {
                $c = $a['case_id'];
            }
            $popups[] = array(
                'alert_id' => $a['id'],
                'case_id' => $a['case_id'],
                'first_name' => $a['first_name'],
                'last_name' => $a['last_name'],
                'at' => date('m/d g:ia', strtotime($a['at'])),
                'title' => $a['title'],
            );
        }
        return $popups;
    }

    public function getByAlertTime($start_datetime, $end_datetime){
        $start_time = substr($start_datetime, 0, -2)."00";
        $end_time = substr($end_datetime, 0, -2)."59";
        $result = Event::select('e.id', 'e.case_id', 'e.title', 'e.description', 'e.at', 'cc.first_name', 'cc.last_name', 'e.user_id',
            'etype.name as event_type_name', 'users.email', 'users.first_name as user_first_name', 'users.last_name as user_last_name', 'cc.primary_phone as cc_phone',
            'cc.email as cc_email', 'users.company_id as user_company_id')
            ->from('events as e')
            ->leftJoin('cases as c', 'e.case_id', 'c.id')
            ->leftJoin('case_contact as cc', 'cc.case_id', 'c.id')
            ->join('users', 'users.id', 'e.user_id')
            ->join('event_types as etype', 'etype.id', 'e.type_id')
            ->where('e.alert_email', 1)
            ->where('users.alert_email', 1)
            ->whereBetween('e.alert_at', [$start_time,$end_time])
            ->get()
            ->toArray();

        if (!count($result)) {
            return array();
        }
        $payload = array();
        foreach ($result as $a) {
            $payload[] = array(
                'alert_id' => $a['id'],
                'case_id' => $a['case_id'],
                'event_type_name' => $a['event_type_name'],
                'first_name' => $a['first_name'],
                'last_name' => $a['last_name'],
                'at' => date('m/d g:ia', strtotime($a['at'])),
                'relative_datetime' => date("Y-m-d H:m:s", $a['at']),
                'description' => $a['description'],
                'title' => $a['title'],
                'user_name' => $a['user_first_name'] . ' '. $a['user_last_name'],
                'user_email' => $a['email'],
                'cc_phone' => $a['cc_phone'],
                'cc_email' => $a['cc_email'],
                'user_company_id' => $a['user_company_id']
            );
        }
        return $payload;
    }

    public function completeReminderPopup($id){
        $result = Event::find($id)->fill(['popup_triggered' => 1]);
        $result->update();
    }

    public function findByFilter($filter, $offset = 0, $limit = 100, $sort_field = 'e.id', $order = 'desc', $count_only = false, $columns = array()){
        if (!$count_only) {
            $query = Event::select('e.id');
        } else {
            $query = Event::selectRaw('COUNT(DISTINCT e.id) as total_records');
        }
        $query->from('events as e')
            ->leftJoin('event_types', 'event_types.id', 'e.type_id')
            ->leftJoin('cases', 'cases.id', 'e.case_id')
            ->leftJoin('case_statuses', 'case_statuses.case_id', 'cases.id')
            ->leftJoin('statuses', 'statuses.id', 'case_statuses.status_id')
            ->leftJoin('users as u', 'u.id', 'e.user_id');
        if (isset($filter['type_id']) && !empty($filter['type_id']) && strlen($filter['type_id']) >= 1) {
            $query->where('e.type_id', $filter['type_id']);
        }
        if (isset($filter['status_id']) && !empty($filter['status_id'])) {
            $query->where('case_statuses.status_id', $filter['status_id']);
        }
        if (isset($filter['case_id']) && !empty($filter['case_id']) && strlen($filter['case_id']) >= 1) {
            $query->where('e.case_id', $filter['case_id']);
        }
        if (isset($filter['status']) && !empty($filter['status'])) {
            if($filter['status'] == 'overdue'){
                $query->where('e.at', '<', date('Y-m-d H:i:s'))
                    ->where('e.completed', null);
            }
            if($filter['status'] == 'completed'){
                $query->where('e.completed', '!=', null);
            }
            if($filter['status'] == 'scheduled'){
                $query->where('e.completed', null)->where('e.at', '>', date('Y-m-d H:i:s'));
            }
        }
        $query->where('e.user_id','=', Model_Account::getUserId());
        if(isset($filter['date_field'])){
            switch ($filter['date_field']) {
                case 'created':
                default:
                    $filter['date_field'] = 'e.created';
                    break;
                case 'due':
                    $filter['date_field'] = 'e.at';
                    $query->where('e.completed', null);
                    break;
                case 'completed':
                    $filter['date_field'] = 'e.completed';
                    $query->where('e.completed', '!=', NULL);
                    break;
                case 'overdue':
                    $filter['date_field'] = 'e.at';
                    $query->where('e.completed', null);
                    break;
            }
        }else{
            $filter['date_field'] = 'e.created';
        }
        if (!empty($filter['dates']) && $filter['dates'] != 'all_time') {
            if ($filter['dates'] == 'today') {
                $query->whereBetween($filter['date_field'], [date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')]);
            } elseif ($filter['dates'] == 'yesterday') {
                $yest = date('Y-m-d', strtotime('-1 day'));
                $query->whereBetween($filter['date_field'], [$yest . ' 00:00:00', $yest . ' 23:59:59']);
            } elseif ($filter['dates'] == 'last7') {
                $query->whereBetween($filter['date_field'], [date('Y-m-d 00:00:00', strtotime('-7 days')),date('Y-m-d 23:59:59')]);
            } elseif ($filter['dates'] == 'last30') {
                $query->whereBetween($filter['date_field'], [date('Y-m-d 00:00:00', strtotime('-30 days')),date('Y-m-d 23:59:59')]);
            } elseif ($filter['dates'] == 'this_month') {
                $query->whereBetween($filter['date_field'], [date('Y-m-') . '01', date('Y-m-d H:59:59')]);
            } elseif ($filter['dates'] == 'last_month') {
                $query->whereBetween($filter['date_field'], [date('Y-m-', strtotime('-1 month')) . '01', date('Y-m-t 23:59:59', strtotime('-1 month'))]);
            } elseif ($filter['dates'] == 'custom') {
                if(!isset($filter['start_date']) || !isset($filter['end_date'])){
                    $filter['start_date'] = date('Y-m-d 00:00:00');
                    $filter['end_date'] = date('Y-m-d 23:59:59');
                }
                $query->whereBetween($filter['date_field'], [date('Y-m-d', strtotime($filter['start_date'])). ' 00:00:00', date('Y-m-d', strtotime($filter['end_date'])) . ' 23:59:59']);
            }
        }
        if (!$count_only) {
            $query->offset($offset)
                ->limit($limit)
                ->orderBy($sort_field, $order)
                ->groupBy('e.id');
        } else {
            $result = $query->first();
            return $result['total_records'];
        }
        $result = $query->get();
        return $result;
    }

    public function findByIDs($ids, $sort_field=false, $order=false){

        if(!$sort_field){
            $sort_field = 'e.created';
        }

        if(!$order){
            $order = 'DESC';
        }

        if(!is_array($ids)){
            $ids = array($ids);
        }

        switch ($sort_field) {
            case 'make_id':
                $sort_field = 'i.make_id';
                break;
            case 'model_id':
                $sort_field = 'i.model_id';
                break;
            case 'color_id':
                $sort_field = 'i.color_id';
                break;
        }

        $result = Event::select('e.*',
           'e.at as datetime', 'event_types.name as event_type_name','case_contact.first_name','case_contact.last_name',
           'statuses.name as case_status_name'
        )
            ->from('events as e')
            ->leftJoin('event_types', 'event_types.id', 'e.type_id')
            ->leftJoin('case_contact', 'case_contact.case_id', 'e.case_id')
            ->leftJoin('case_statuses', 'case_statuses.case_id', 'e.case_id')
            ->leftJoin('statuses', 'statuses.id', 'case_statuses.status_id')
            ->leftJoin('users as u', 'u.id', 'e.user_id')
            ->whereIn('e.id', $ids)
            ->orderBy($sort_field, $order);
        return $result->get();
    }

    public function findByCaseIDs($case_ids){
        $result = Event::select('e.*', 'e.at as datetime', 'event_types.name as event_type_name')
            ->from('events as e')
            ->leftJoin('event_types', 'event_types.id', 'e.type_id')
            ->leftJoin('users as u', 'u.id', 'e.user_id')
            ->whereIn('e.case_id', $case_ids);
        return $result->get();
    }

    public function availabilityAlgorithm($events, $start, $end, $duration, $user_id){
        $businessHours = $this->calendarOption->getHoursByUser($user_id);
        $companyHolidays = $this->calendarOption->getHolidaysByCompany($this->user->findCompanyByUserId($user_id));
        $frequency = '15 minutes';
        $time_slots = array();
        $time = $this->roundTime($start, 15);
        while($time < $end){
            if($this->canSchedule($time, $businessHours, $companyHolidays, $duration)){
                if (count($events) != 0) {
                    for ($i = 0; $i < count($events); $i++) {
                        //check if the event starting at $time would intersect any other events
                        if((($events[$i]['start'] <= $time) && ($time < $events[$i]['end'])) ||
                            (($events[$i]['start'] <= $this->addTime($duration, strtotime($time)))
                                && ($this->addTime($duration, strtotime($time)) < $events[$i]['end']))) {
                            $i = count($events);
                        }else if($i == count($events) - 1) {
                            array_push($time_slots, date("D M jS Y h:i a", strtotime($time)));
                        }
                    }
                }else{
                    array_push($time_slots, date("D M jS Y h:i a", strtotime($time)));
                }
                $time = $this->addTime($frequency, strtotime($time));
            }
        }
        //return available time_slots as an array
        return $time_slots;
    }

    private static function addTime ($time1, $time2){
        return date("Y-m-d H:i:s", strtotime("+" . $time1, $time2));
    }
    
    private static function appendTime($date, $time){
        return date ("Y-m-d H:i:s", strtotime(date("Y-m-d", $date) . " " . $time));
    }

    private static function roundTime($time, $precision) {
        $time = strtotime($time);
        $precision = 60 * $precision;
        return date("Y-m-d H:i:s", ceil($time / $precision) * $precision);
    }
    private static function canSchedule(&$time, $businessHours, $companyHolidays, $duration=0){
        $days = array('sun', 'mon', 'tues', 'wed', 'thur', 'fri', 'sat');
        $weekday = date('w', strtotime($time));
        $canSchedule = true;
        if(1 == $businessHours[$days[$weekday]]){
            $canSchedule = false;
            $time = date("Y-m-d 00:00:00", strtotime('+1 Day', strtotime($time)));
        }else if(self::addTime($duration, strtotime($time)) > self::appendTime(strtotime($time), $businessHours[$days[$weekday] . 'End'])){
            $canSchedule = false;
            $time = date("Y-m-d 00:00:00", strtotime('+1 Day', strtotime($time)));
        }else if($time < self::appendTime(strtotime($time), $businessHours[$days[$weekday] . 'Start'])){
            $canSchedule = false;
            $time = self::roundTime(self::appendTime(strtotime($time), $businessHours[$days[$weekday] . 'Start']), 15);
        }else if(self::intersectsCompanyHoliday($time, $companyHolidays)){
            $canSchedule = false;
            $time = date("Y-m-d 00:00:00", strtotime('+1 Day', strtotime($time)));
        }
        return $canSchedule;
    }

    
    private static function intersectsCompanyHoliday($time, $companyHolidays){
        $names = array("NY", "MLK", "president", "easter", "memorial", "fourth", "labor", "columbus", "veterans", "thanksgiving", "christmasEve", "christmas", "NYE");
        $holidays = self::getHolidays($time);
        $conflict = false;
        for($i = 0; ($i < count($holidays)) && !$conflict; $i++){
            if(isset($companyHolidays[$names[$i]])) {
                if (("closed" == $companyHolidays[$names[$i]]) && ($holidays[$i] == date('Y-m-d', strtotime($time)))) {
                    $conflict = true;
                }
            }
        }
        return $conflict;
    }

    private static function getHolidays($time){
        //finds dates of the federal holidays
        $holidays = array();
        $year = date('Y', strtotime($time)); //$time's year

        array_push($holidays, $year . '-01-01'); //New Year's day
        array_push($holidays, date('Y-m-d', strtotime("january $year third monday"))); //Martin Luthor King Jr. Day
        array_push($holidays, date('Y-m-d', strtotime("february $year third monday"))); //Presidents Day
        array_push($holidays, date('Y-m-d', easter_date($year))); // Easter

        //Memorial Day is slightly more complicated
        $MDay = date('Y-m-d', strtotime("may $year first monday")); // Memorial Day
        //("may $year last monday") will give you the last monday of may 1967
        $explodedMDay = explode("-",$MDay);
        $month = $explodedMDay[1];
        $day = $explodedMDay[2];

        while($day <= 31){
            $day = $day + 7;
        }
        if($day > 31){
            $day = $day - 7;
        }

        $MDay = $year.'-'.$month.'-'.$day;
        array_push($holidays, $MDay);

        array_push($holidays, $year . '-07-04'); //Independence Day
        array_push($holidays, date('Y-m-d', strtotime("september $year first monday"))); //Labor Day
        array_push($holidays, date('Y-m-d', strtotime("october $year third monday"))); //Columbus Day
        array_push($holidays, $year . '-11-11'); //Veteran's Day

        //Thanksgiving is slightly more complicated
        $thanksgiving = date('Y-m-d', strtotime("november $year first thursday")); // Thanksgiving
        //("november $year last thursday") will give you the last thursday of november 1967
        $explodedThanksgiving = explode("-",$thanksgiving);
        $month = $explodedThanksgiving[1];
        $day = $explodedThanksgiving[2];

        while($day <= 30){
            $day = $day + 7;
        }
        if($day > 30){
            //watch out for the days in the month November only have 30
            $day = $day - 7;
        }

        $thanksgiving = $year.'-'.$month.'-'.$day;
        array_push($holidays, $thanksgiving);

        array_push($holidays, $year . '-12-24'); //Christmas Eve
        array_push($holidays, $year . '-12-25'); //Christmas
        array_push($holidays, $year . '-12-31'); //New Year's Eve

        return $holidays;
    }
}