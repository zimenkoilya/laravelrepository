<?php

namespace App\Repositories;

use App\Models\StudentQaResult;

class StudentQaResultRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var StudentQaResult
     */
    protected $model;

    /**
     * Constructor
     *
     * @param StudentQaResult $StudentQaResult
     */
    public function __construct(StudentQaResult $StudentQaResult)
    {
        $this->model = $StudentQaResult;
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