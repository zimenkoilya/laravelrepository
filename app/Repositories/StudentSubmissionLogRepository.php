<?php

namespace App\Repositories;

use App\Models\StudentSubmissionLog;

class StudentSubmissionLogRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var StudentSubmissionLog
     */
    protected $model;

    /**
     * Constructor
     *
     * @param StudentSubmissionLog $StudentSubmissionLog
     */
    public function __construct(StudentSubmissionLog $StudentSubmissionLog)
    {
        $this->model = $StudentSubmissionLog;
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