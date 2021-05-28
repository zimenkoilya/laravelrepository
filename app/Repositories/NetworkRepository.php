<?php

namespace App\Repositories;

use App\Models\Network;
use App\Models\Company;

class NetworkRepository
{
    use BaseRepository;

    /**
     * Network Model
     *
     * @var Network
     */
    protected $model;

    /**
     * Constructor
     *
     * @param Network $Network
     */
    public function __construct(Network $Network)
    {
        $this->model = $Network;
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

    public function queryNetwork($query, $company_ids,$alias=null,$column=null){

        if(auth()->user()->id == 1 || auth()->user()->company_id == 1 || auth()->user()==null ){
            return $query;
        }

        if(!$column){
            $column = 'company_id';
        }

        if(is_array($company_ids)) {
            if($alias){
                $query->whereIn($alias.'.'.$column, $company_ids);
            }else {
                $query->whereIn($column, $company_ids);
            }
        }else{
            if($alias){
                $query->where($alias.'.'.$column, $company_ids);
            }else {
                $query->where($column, $company_ids);
            }
        }
        return $query;
    }

    public function queryNetworkCases($queryObject, $company_ids){
        //var_dump($company_ids); exit;
        if(is_array($company_ids)) {
            $queryObject->whereIn('c.company_id', $company_ids);
        }else{
            $queryObject->where('c.company_id', $company_ids);
        }
        return $queryObject;
    }

    public function findCompanyNetworkIds($company_id){

        if($company_id != 1) {
            $query = $this->model->select('nc.company_id')->from('networks, n')
                ->leftJoin('networks_companies', 'nc', 'nc.network_id', 'n.id')
                ->where('n.company_id', $company_id)->groupBy('nc.company_id');
        }else{
            // System Access
            $query = Company::select('id as company_id');
        }

        $result = $query->get()->toArray();
        if($result){
            $ids = array();
            foreach($result as $cid){
                $ids[] = $cid['company_id'];
            }
            return $ids;
        }
        return array($company_id);
    }
}