<?php

namespace App\Repositories;

use App\Models\UserCallStatus;

class UserCallStatusRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var UserCallStatus
     */
    protected $model;

    /**
     * Constructor
     *
     * @param UserCallStatus $UserCallStatus
     */
    public function __construct(UserCallStatus $UserCallStatus)
    {
        $this->model = $UserCallStatus;
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
    public function pageWithRequest($request, $number = 10, $sort = 'asc', $sortColumn = 'updated')
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