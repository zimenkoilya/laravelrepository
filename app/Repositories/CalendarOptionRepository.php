<?php

namespace App\Repositories;

use App\Models\CalendarOption;
use App\Repositories\UserRepository;

class CalendarOptionRepository
{
    use BaseRepository;

    /**
     * CalendarOption Model
     *
     * @var CalendarOption
     */
    protected $model;

    /**
     * Constructor
     *
     * @param CalendarOption $CalendarOption
     */
    public function __construct(CalendarOption $CalendarOption, UserRepository $user)
    {
        $this->model = $CalendarOption;
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

    public function getHoursByUser($user_id){
        $result = $this->model->select('hours_params')->where('user_id', $user_id)->first();
        if(empty($result)){
            $payload = $this->getBusinessHoursByCompany($this->user->findCompanyByUserId($user_id));
        }else{
            $payload = json_decode($result['hours_params'], true);
        }
        return $payload;
    }

    public function getBusinessHoursByCompany($company_id){
        $result = $this->model->select('hours_params')
            ->where('company_id', $company_id)
            ->where('user_id', null)
            ->first()
            ->toArray();
        if(empty($result) || null == $result['hours_params']){
            $result = $this->model->select('hours_params')
                ->where('company_id', null)
                ->where('user_id', null)
                ->get()
                ->toArray();
        }
        $payload = json_decode($result['hours_params'], true);
        return $payload;
    }

    public function getHolidaysByCompany($company_id){
        $result = $this->model->select('holiday_params')
            ->where('company_id', $company_id)
            ->where('user_id', null)
            ->first()
            ->toArray();
        $payload = JSON_decode($result['holiday_params'], true);
        return $payload;
    }
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
}