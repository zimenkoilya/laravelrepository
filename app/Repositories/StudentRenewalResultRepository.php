<?php

namespace App\Repositories;

use App\Models\StudentRenewalResult;

class StudentRenewalResultRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var StudentRenewalResult
     */
    protected $model;

    /**
     * Constructor
     *
     * @param StudentRenewalResult $StudentRenewalResult
     */
    public function __construct(StudentRenewalResult $StudentRenewalResult)
    {
        $this->model = $StudentRenewalResult;
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
    public function pageWithRequest($request, $number = 10, $sort = 'asc', $sortColumn = 'id')
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