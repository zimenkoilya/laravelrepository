<?php

namespace App\Repositories;

use App\Models\Action;

class ActionRepository
{
    use BaseRepository;

    /**
     * Action Model
     *
     * @var Action
     */
    protected $model;
    private $case_id;
    private $action_id;
    private $note;
    private $to_user;
    private $action_obj;
    private $action_user_id;
    private $reason_ids;
    /**
     * Constructor
     *
     * @param Action $action
     */
    public function __construct(Action $action)
    {
        $this->model = $action;
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
    public function pageWithRequest($request, $number = 10, $sort = 'desc', $sortColumn = 'created_at')
    {
        $keyword = $request->get('keyword');

        if ($request->has('limit')) {
            $number = $request->get('limit');
        }

        return $this->model->when($keyword, function ($query) use ($keyword) {
                    $query->where('name', 'like', "%{$keyword}%")
                          ->orWhere('description', 'like', "%{$keyword}%");
                })
                ->orderBy($sortColumn, $sort)
                ->paginate($number);
    }

    static function findAll(){
            
        $result = $this->model->select('a.*', 'g.name as group')
                ->from('actions as a')
                ->leftJoin('action_groups as g', 'a.group_id', 'g.id')
                ->orderBy('a.name', 'asc')
                ->get();
        
        return $result;
        
    }

    static function findSystemAndCompany($company_id){
        $result = $this->model->select('a.*', 'g.name as group')
            ->from('actions as a')
            ->leftJoin('action_groups as g', 'a.group_id', 'g.id')
            ->whereIn('a.company_id', [1, $company_id])
            ->orderBy('a.name', 'asc')
            ->get();

        return $result;
    }

    static function getSharedActionsByCompanies($companies){

        $result = $this->model->select('a.*', 'g.name as group')
            ->from('actions as a')
            ->leftJoin('action_groups as g', 'a.group_id', 'g.id')
            ->whereIn('a.company_id', $companies)
            ->where('a.shared', 1)
            ->orderBy('a.name', 'asc')
            ->get();

        return $result;

    }

    static function findAllByUserCompany($company_id){

        $result = $this->model->select('a.*', 'g.name as group')
            ->from('actions as a')
            ->leftJoin('action_groups as g', 'a.group_id', 'g.id')
            ->where('a.company_id', $company_id)
            ->orderBy('a.name', 'asc')
            ->get();

        return $result;

    }


    static function findSystemAndUserCompany($company_id, $user_company_id=null){


        $companies[] = 1;
        $companies[] = $company_id;
        if($user_company_id && $company_id != $user_company_id){
            $companies[] = $user_company_id;
        }

        $result = $this->model->select('a.*', 'g.name as group', 'co.name as company_name')
            ->from('actions as a')
            ->leftJoin('action_groups as g', 'a.group_id', 'g.id')
            ->join('companies as co', 'co.id', 'a.company_id')
            ->whereIn('a.company_id', $companies)
            ->orderBy('a.name', 'asc')
            ->get();

        return $result;

    }

    static function findByCompany($company_id){

        $result = $this->model->select('a.*', 'g.name as group')
            ->from('actions as a')
            ->leftJoin('action_groups as g', 'a.group_id', 'g.id')
            ->where('a.company_id', $company_id)
            ->orderBy('a.name', 'asc')
            ->get();

        return $result;

    }

    static function findAllInNetwork(){

        $query = $this->model->select('a.*', 'g.name as group')
            ->from('actions as a')
            ->leftJoin('action_groups as g', 'a.group_id', 'g.id');
        $query = Model_Networks::queryNetwork($query, Model_System_User::getSessionMeta('network_companies'));
        $query->order_by('a.name', 'ASC');

        return $query->execute()->as_array();
    }

    static function findSystemActions(){

        $result = \DB::select('a.*')
            ->from(array('actions', 'a'))
            ->where('a.isSystem','=', 1)
            ->order_by('a.name', 'asc')
            ->execute();

        return $result->as_array();

    }

    static function findByUserGroup($user_id, $company_id=false){

        $query = \DB::select('a.*', array('g.name', 'group'))
            ->from(array('actions', 'a'))
            ->join(array('action_groups', 'g'), 'LEFT')->on('a.group_id', '=', 'g.id')
            ->join(array('users_actiongroups','uag'),'LEFT')->on('uag.group_id','=','g.id')
            ->where('uag.user_id', '=', $user_id);
        if($company_id) {
            $query->where('a.company_id', '=', $company_id);
        }

        $result = $query->order_by('a.name', 'asc')->group_by('a.id')
            ->execute()->as_array();

        return $result;

    }


    static function findByStatusAndCompany($status_id,$company_id)
    {

        $query = \DB::select('a.*')
            ->from(array('actions', 'a'))
            ->join(array('actions_statuses', 'as'))->on('as.action_id', '=', 'a.id')
            ->where('as.status_id', '=', $status_id)
            ->where('a.company_id', '=', $company_id);

        $result = $query->order_by('a.name', 'asc')
            ->group_by('a.id')
            ->execute()->as_array();

        return $result;
    }

    static function findByUserGroupAndStatus($user_id, $status_id, $company_id=false){

        $query = \DB::select('a.*', array('g.name', 'group'))
            ->from(array('actions', 'a'))
            ->join(array('action_groups', 'g'), 'LEFT')->on('a.group_id', '=', 'g.id')
            ->join(array('actions_statuses', 'as'))->on('as.action_id', '=', 'a.id')
            ->join(array('users_actiongroups','uag'),'LEFT')->on('uag.group_id','=','g.id')
            ->where('uag.user_id', '=', $user_id)
            ->where('as.status_id', '=', $status_id);


        $result = $query->order_by('a.name', 'asc')->group_by('a.id')
            ->execute()->as_array();

        return $result;



      /*  $query = \DB::select('a.*', array('g.name', 'group'))
            ->from(array('actions', 'a'))
            ->join(array('action_groups', 'g'), 'LEFT')->on('a.group_id', '=', 'g.id')
            ->join(array('actions_statuses', 'as'))->on('as.action_id', '=', 'a.id')
            ->join(array('users_actiongroups','uag'),'LEFT')->on('uag.group_id','=','g.id')
            ->where('uag.user_id', '=', $user_id)
            ->where('as.status_id', '=', $status_id);
        if($company_id) {
            $query->where('a.company_id', '=', $company_id);
        }

        $result = $query->order_by('a.name', 'asc')->group_by('a.id')
            ->execute()->as_array();

        return $result; */

    }

    static function findAllTypes(){
        $result = \DB::select()->from('actions')->execute();
        return $result->as_array();
    }
    
   /* static function findByStatus($status_id){
        
        $result = \DB::select('a.*')
                            ->from(array('actions','a'))
                            ->join(array('actions_statuses', 'as'))->on('as.action_id', '=', 'a.id')
                            ->where('as.status_id', '=', $status_id)->order_by('view_id')
                            ->execute();
        
        return $result->as_array();
    }*/

    /**
     * @param $status_id
     * @return array
     */
    static function getStatuses($action_id){

        $result = \DB::select('status_id')->from('actions_statuses')->where('action_id', '=', $action_id)->execute();

        $ids = array();
        foreach($result->as_array() as $row){
            $ids[] = $row['status_id'];
        }

        return $ids;

    }

    /**
     * @param $status_id
     * @param $action_ids
     */
    static function manageStatuses($action_id, $status_ids){

        DB::delete('actions_statuses')->where('action_id', '=', $action_id)->execute();
        $query = \DB::insert('actions_statuses')->columns(array('action_id','status_id'));

        foreach($status_ids as $id){
            $query->values(array($action_id,$id));
        }

        $result = $query->execute();

    }

    /**
     * @param $action_id
     * @return array
     */
    static function getReasonLists($action_id){

        $result = \DB::select('reason_list_id')
                    ->from('actions_reason_lists')
                    ->where('action_id', '=', $action_id)
                    ->execute();

        $ids = array();
        foreach($result->as_array() as $row){
            $ids[] = $row['reason_list_id'];
        }

        return $ids;

    }

    /**
     * @param $action_id
     * @param $reason_ids
     */
    static function manageReasons($action_id, $reason_ids){

        $existing_reason_ids = Model_System_ReasonListItem::findIdsByActionId($action_id);

        $add_reasons = array_diff($reason_ids, $existing_reason_ids);
        $remove_reasons = array_diff($existing_reason_ids, $reason_ids);

        if(!empty($add_reasons)){
            Model_System_ReasonListItem::addToAction($add_reasons, $action_id);
        }

        if(!empty($remove_reasons)){
            Model_System_ReasonListItem::removeFromActions($remove_reasons, $action_id);
        }

    }


    static function findByStatus($status_id){

        $result = \DB::select('a.*')
            ->from(array('actions','a'))
            ->join(array('actions_statuses', 'as'))->on('as.action_id', '=', 'a.id')
            ->where('as.status_id', '=', $status_id)
            ->order_by('a.name', 'ASC')
            ->execute();

        return $result->as_array();
    }
    
    static function findIDsByGroup($group_id){
        
        $result = \DB::select('id')->from('actions')->where('group_id', '=', $group_id)->execute();
        
        $ids = array();
        foreach($result->as_array() as $r){
            $ids[] = $r['id'];
        }
        
        return $ids;
    }

    static function findActionsByGroup($group_id){

        $result = \DB::select()->from('actions')->where('group_id', '=', $group_id)->execute();
        return $result->as_array();
    }
    
    static function findActionID($action){
        
        if(is_numeric($action)){
            return $action;
        }
        
        $result = \DB::select('id')->from('actions')->where('name', '=', $action)->execute();
        $row = current($result->as_array());
        
        return $row['id'];
        
    }

    static function findSystemAndCompanyBatch($company_id){

        $result = \DB::select('a.*', array('g.name', 'group'))
            ->from(array('actions', 'a'))
            ->join(array('action_groups', 'g'), 'LEFT')->on('a.group_id', '=', 'g.id')
            ->where('a.company_id','IN', array(1, $company_id))
            ->where('in_batch', '=', '1')
            ->order_by('a.name', 'asc')
            ->execute();

        return $result->as_array();
    }

    static function findInBatchNetwork(){

        $query = \DB::select()->from('actions')->order_by('name')
            ->where('in_batch', '=', '1');
        $query = Model_Networks::queryNetwork($query, Model_System_User::getSessionMeta('network_companies'));
        return $query->execute()->as_array();

    }
    
    static function add($data){
        if(isset($data['status_ids']) && !empty($data['status_ids'])){
            $status_ids = $data['status_ids'];
            unset($data['status_ids']);
        }

        if(isset($data['reason_ids'])){
            $reason_ids = $data['reason_ids'];
            unset($data['reason_ids']);
        }

        $result = \DB::insert('actions')->set($data)->execute();
        $action_id = current($result);

        if(isset($status_ids) && !empty($status_ids)) {
            self::manageStatuses($action_id, $status_ids);
        }

        if(isset($reason_ids)){
            self::manageReasons($action_id, $reason_ids);
        }

        return $action_id;

    }
    
    static function update($id, $data){
        if(isset($data['status_ids']) && !empty($data['status_ids'])){
            self::manageStatuses($id, $data['status_ids']);
            unset($data['status_ids']);
        }

        $reason_ids = array();
        if(isset($data['reason_ids'])){
            $reason_ids = $data['reason_ids'];
            unset($data['reason_ids']);
        }

        self::manageReasons($id, $reason_ids);

        $result = \DB::update('actions')->set($data)->where('id', '=', $id)->execute();
    }
    
    static function delete($id){
        $result = \DB::delete('actions')->where('id','=',$id)->execute();
    }
    
    static function validate($factory){
        
        $val = \Validation::forge($factory);

        $val->add('name', 'Name')
            ->add_rule('required');

        return $val;
    }
}