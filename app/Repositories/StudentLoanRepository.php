<?php

namespace App\Repositories;

use App\Models\StudentLoan;

class StudentLoanRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var StudentLoan
     */
    protected $model;

    /**
     * Constructor
     *
     * @param StudentLoan $StudentLoan
     */
    public function __construct(StudentLoan $StudentLoan)
    {
        $this->model = $StudentLoan;
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