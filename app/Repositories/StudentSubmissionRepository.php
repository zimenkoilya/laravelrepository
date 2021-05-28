<?php

namespace App\Repositories;

use App\Models\StudentSubmission;

class StudentSubmissionRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var StudentSubmission
     */
    protected $model;

    /**
     * Constructor
     *
     * @param StudentSubmission $StudentSubmission
     */
    public function __construct(StudentSubmission $StudentSubmission)
    {
        $this->model = $StudentSubmission;
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