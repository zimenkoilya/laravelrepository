<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Network;
class UserRepository
{
    use BaseRepository;

    /**
     * User Model
     *
     * @var User
     */
    protected $model;

    /**
     * Constructor
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->model = $user;
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

    public function findCompanyByUserId($user_id){
        $result = $this->model->select('company_id')
            ->where('active', 1)
            ->where('id','=', $user_id)
            ->first()->toArray();
        if($result){
            return $result['company_id'];
        }
        return false;
    }

    public function pageWithRequest($request, $number = 10, $sort = 'desc', $sortColumn = 'created_at')
    {
        $keyword = $request->get('keyword');

        if ($request->has('limit')) {
            $number = $request->get('limit');
        }

        return $this->model->when($keyword, function ($query) use ($keyword) {
                    $query->where('first_name', 'like', "%{$keyword}%")
                          ->orWhere('last_name', 'like', "%{$keyword}%")
                          ->orWhere('email', 'like', "%{$keyword}%");
                })
                // ->where('active', 1)
                // ->whereNotNull('email_verified_at')
                ->orderBy($sortColumn, $sort)
                ->paginate($number);
    }

    /**
     * Change the user password.
     *
     * @param  App\User $user
     * @param  string $password
     * @return boolean
     */
    public function changePassword($user, $password)
    {
        return $user->update(['password' => bcrypt($password)]);
    }   
    public function getSessionMeta(){
        if(auth()->user()&&auth()->user()->id && !empty(auth()->user()->id)){
            return auth()->user()->id;
        }
        return false;
    }

    public function findByCompany($company_id){
        $result = $this->model->where('active', 1)
            ->where('company_id', $company_id)
            ->orderBy('first_name', 'asc')
            ->get();
        return $result;
    }

    public function findAllActive(){
        $query = $this->model->selectRaw('users.*, companies.name as company_name, CONCAT(users.first_name, " ", users.last_name) as name')
            ->leftJoin('companies', 'companies.id', 'users.company_id');
        $query = Network::queryNetwork($query, auth()->user()->company_id, 'users');
        $result = $query->where('active', 1)->orderBy('first_name', 'asc')->get();
        return $result;
    }
}