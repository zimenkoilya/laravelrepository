<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Spatie\Activitylog\Models\Activity;
use App\Repositories\EventRepository;
use App\Repositories\EventTypeRepository;
use App\Repositories\UserRepository;
use App\Repositories\StatusRepository;
use App\Repositories\CasesRepository;
class EventController extends Controller
{
    public function __construct(EventRepository $eventRepository, EventTypeRepository $eventtypeRepository, UserRepository $userRepository, StatusRepository $statusRepository, CasesRepository $caseRepository)
    {
        $this->event = $eventRepository;
        $this->eventType = $eventtypeRepository;
        $this->user = $userRepository;
        $this->status = $statusRepository;
        $this->cases = $caseRepository;
    }

    public function action_listing_(){

        $data['events'] = $this->event->findByUser(auth()->user()->id, $this->offset, $this->limit);

        $case_ids = array();
        foreach($data['events'] as $e){
            $case_ids[] = $e->case_id;
        }

        $data['cases'] = array();
        if(!empty($case_ids)){
            $data['cases'] = $this->cases->findByIDs($case_ids);
        }
        $data['pagination'] = array('limit' => $this->limit, 'total_items' => $this->event->findCountByUserID(auht()->user()->id));
        
        return json_encode($data);
    }

    public function action_by_date($start_date = null, $end_date = null){

        if(empty($start_date)){
            $start_date = date('Y-m-d');
        }

        $data['events'] = $this->event->findByDate($start_date, $end_date);

        $case_ids = array();
        foreach($data['events'] as $e){
            $case_ids[] = $e->case_id;
        }

        $data['cases'] = array();
        if(!empty($case_ids)){
            $data['cases'] = $this->cases->findByIDs($case_ids);
        }

        return json_encode($data);
    }

    public function action_get_overdue_count(){
        $user_id = $this->user->getSessionMeta();
        $count = $this->event->findOverdueCountByUserID($user_id);
        echo $count;
    }

    public function action_by_status($status){
        $data['events'] = $this->event->findByStatus($status);

        $case_ids = array();
        foreach($data['events'] as $e){
            $case_ids[] = $e->case_id;
        }

        $data['cases'] = array();
        if(!empty($case_ids)){
            $data['cases'] = $this->cases->findByIDs($case_ids);
        }

        return json_encode($data);
    }

    public function action_add(Request $request){

        try{
            $this->event->add($request);
        }catch(Exception $e){
            Log::error($e);
        }

        $data['event_types'] = $this->eventType->findByCompanyOwnerAndShared(auth()->user()->company_id);
        $data['users'] = $this->user->findByCompany(auth()->user()->company_id);

        return json_encode($data);

    }


    public function action_ajax_add(Request $request){

            try{
                unset($request->searchMethod);
                unset($request->searchStart);
                unset($request->searchEnd);
                if($request->duration){
                    $request->endtime = date("Y-m-d H:i:s", strtotime("+" . $request->duration, strtotime($request->datetime)));
                    unset($request->duration);
                }
                $this->event->add($request);
                echo json_encode(
                    array(
                        'success' => true,
                        'message' => 'Appointment Added'
                    )
                );
                die();
            }catch(Exception $e){
                Log::info('appointment_ajax_add',$e->getMessage());
                echo json_encode(
                    array(
                        'success' => false,
                        'message' => $e->getMessage()
                    )
                );
                die();
            }

    }

    public function action_ajax_calendarAdd(Request $request){

        try {
            $event_id = $this->event->add($request);
            echo json_encode(
                array(
                    'success' => true,
                    'message' => 'Appointment Added'
                )
            );
            die();
        }catch(Exception $e){
            Log::info('appointment_calendarAdd',$e->getMessage());
            echo json_encode(
                array(
                    'success' => false,
                    'message' => $e->getMessage()
                )
            );
            die();
        }
        //??? $payload
        echo json_encode($payload);
    }

    public function action_snooze(Request $request){

        $errors = array();
        try{
            $this->model->snoozer($request);
        }catch(Exception $e){
            $errors = $e;
        }

        if(empty($errors)){
            return json_encode(
                array(
                    'success' => true,
                    'message' => 'You Snoozed!'
                )
            );
        }else{
            return json_encode(
                array(
                    'success' => false,
                    'message' => $errors
                )
            );
        }
    }

    public function action_update(Request $request, $id){

        try{
            if(!isset($request->alert_email)){
                $request->alert_email = 0;
            }
            if(!isset($request->alert_popup)){
                $request->alert_popup = 0;
            }

            $this->event->update_($id, $request);
            notify()->success('Appointment Updated');
            return back();
        }catch(Exception $e){
           return $e;
        }

        $data['event_types'] = $this->eventType->findByCompanyOwnerAndShared(auth()->user()->company_id);
        $data['users'] = $this->user->findAllActive();
        $data['event'] = $this->event->find($id);

        return json_encode($data);

    }

    public function action_ajax_update(Request $request){
        try{

            $id = $request->id;

            if($request->alert_email==null){
                $request->alert_email = 0;
            }
            if($request->alert_popup==null){
                $request->alert_popup = 0;
            }
            $request->event->update_($id, $request);

            echo json_encode(
                array(
                    'success' => true,
                    'message' => 'Appointment Updated'
                )
            );

            die();

        }catch(Exception $e){

            Log::info('appointment_ajax_updates',$e->getMessage());

            echo json_encode(
                array(
                    'success' => false,
                    'message' => $e->getMessage()
                )
            );

            die();
        }
    }

    public function action_ajax_date_update(Request $request){

        try{
            $post_data = array();
            // Convert Date to Proper Format
            $post_data['datetime'] = date("Y-m-d H:i:s", strtotime($request->new_date));

            if (isset($request->new_end)){
                $post_data['endtime'] = date("Y-m-d H:i:s", strtotime($request->new_end));
            }

            $id = $request->id;
            // Confirm App ID
            $this->event->update_($id, $post_data);

            echo json_encode(
                array(
                    'success' => true,
                    'message' => 'Appointment Updated'
                )
            );

            die();

        }catch(Exception $e){

            Log::info('appointment_ajax_date_updates',$e->getMessage());

            echo json_encode(
                array(
                    'success' => false,
                    'message' => $e->getMessage()
                )
            );

            die();
        }
    }

    public function action_delete($id){

        try{
            $this->event->destroy($id);
            notify()->success('Appointment Updated');
        }catch(Exception $e){
            return $e;
        }

        return true;
    }

    public function action_ajax_delete(Request $request){

        try{
            $this->event->destroy($request->id);
            echo json_encode(
                array(
                    'success' => true,
                    'message' => 'Appointment Deleted'
                )
            );

            die();
        }catch(Exception $e){

            Log::info('ajax_delete_appointment',$e->getMessage());

            echo json_encode(
                array(
                    'success' => false,
                    'message' => $e->getMessage()
                )
            );

            die();
        }
        return true;
    }

    public function action_complete($id){

        try{
            $event = $this->event->find($id);
            $this->event->complete($id);
            notify()->success('Appointment Updated');
            activity()->log($event['case_id'], 'Appointment',$event['event_type_name'].' Completed');

        }catch(Exception $e){
            return $e;
        }
        return true;
    }

    public function action_popups(){

        $popups = $this->event->getPopups();
        return json_encode($popups);

    }

    public function action_record_popup($id){
        $this->event->completeReminderPopup($id);
    }

    public function action_ajax_retrieveById(Request $request){

        $id = $request->id;
        $event = $this->event->find($id);

        if ($event) {
            $event['datetime'] = date('m/d/Y g:i a', strtotime($event->datetime));
            if (!empty($event['endtime'])) {
                $event['endtime'] = date('m/d/Y g:i a', strtotime($event->endtime));
            }
        }
        echo json_encode($event);
    }


    public function action_ajax_findAvailabilityByUser(Request $request)
    {
        $numSuggested = 50;

        try {

            if(('searchBetween' == $request->searchMethod) && isset($request->searchStart) && isset($request->searchEnd)){

                $startSearch = date("Y-m-d 00:00:00", strtotime($request->searchStart));
                $endSearch = date("Y-m-d 23:59:59", strtotime($request->searchEnd));

                $event_group = $this->event->findByUserAndDate($startSearch, $endSearch, $request->user_id);

                //logic to find available start times take care of this in the model
                $time_slots = $request->event->availabilityAlgorithm($event_group, $startSearch, $endSearch, $request->duration, $_GET['user_id']);


            }else{
                $startSearch = date("Y-m-d H:i:s");
                $endSearch = date("Y-m-d 23:59:59", strtotime('+1 Day'));

                $event_group = $this->event->findByUserAndDate($startSearch, $endSearch, $_GET['user_id']);

                //logic to find available start times take care of this in the model
                $time_slots = $this->event->availabilityAlgorithm($event_group, $startSearch, $endSearch, $_GET['duration'], $_GET['user_id']);

                while (count($time_slots) < $numSuggested){

                    $startSearch = $endSearch;
                    $endSearch = date("Y-m-d 23:59:59", strtotime('+1 Day', strtotime($startSearch)));

                    $event_group = $this->event->findByUserAndDate($startSearch, $endSearch, $_GET['user_id']);

                    //logic to find available start times take care of this in the model
                    $time_slots = array_merge($time_slots, $this->event->availabilityAlgorithm($event_group, $startSearch, $endSearch, $_GET['duration'], $_GET['user_id']));
                }

            }

            echo json_encode($time_slots);

            die();

        }catch(Exception $e){

            Model_Log::append('schedule_availability',$e->getMessage());

            echo json_encode(
                array(
                    'success' => false,
                    'message' => $e->getMessage()
                )
            );
            die();
        }

        die();

    }

}
