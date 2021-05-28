<?php

namespace App\Repositories;

use App\Models\UserActivity;

class UserActivityRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var UserActivity
     */
    protected $model;

    /**
     * Constructor
     *
     * @param UserActivity $UserActivity
     */
    public function __construct(UserActivity $UserActivity)
    {
        $this->model = $UserActivity;
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
    public function pageWithRequest($request, $number = 10, $sort = 'asc', $sortColumn = 'timestamp')
    {
        $keyword = $request->get('keyword');

        if ($request->has('limit')) {
            $number = $request->get('limit');
        }
        return $this->model
        ->orderBy($sortColumn, $sort)
        ->paginate($number);
    }
}