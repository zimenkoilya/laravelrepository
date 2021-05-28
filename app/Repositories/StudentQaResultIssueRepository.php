<?php

namespace App\Repositories;

use App\Models\StudentQaResultIssue;

class StudentQaResultIssueRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var StudentQaResultIssue
     */
    protected $model;

    /**
     * Constructor
     *
     * @param StudentQaResultIssue $StudentQaResultIssue
     */
    public function __construct(StudentQaResultIssue $StudentQaResultIssue)
    {
        $this->model = $StudentQaResultIssue;
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