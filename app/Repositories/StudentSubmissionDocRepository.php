<?php

namespace App\Repositories;

use App\Models\StudentSubmissionDoc;

class StudentSubmissionDocRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var StudentSubmissionDoc
     */
    protected $model;

    /**
     * Constructor
     *
     * @param StudentSubmissionDoc $StudentSubmissionDoc
     */
    public function __construct(StudentSubmissionDoc $StudentSubmissionDoc)
    {
        $this->model = $StudentSubmissionDoc;
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