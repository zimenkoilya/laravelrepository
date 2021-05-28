<?php

namespace App\Repositories;

use App\Models\StudentSubmissionLoan;

class StudentSubmissionLoanRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var StudentSubmissionLoan
     */
    protected $model;

    /**
     * Constructor
     *
     * @param StudentSubmissionLoan $StudentSubmissionLoan
     */
    public function __construct(StudentSubmissionLoan $StudentSubmissionLoan)
    {
        $this->model = $StudentSubmissionLoan;
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