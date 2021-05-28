<?php

namespace App\Repositories;

use App\Models\StudentLoanDetail;

class StudentLoanDetailRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var StudentLoanDetail
     */
    protected $model;

    /**
     * Constructor
     *
     * @param StudentLoanDetail $StudentLoanDetail
     */
    public function __construct(StudentLoanDetail $StudentLoanDetail)
    {
        $this->model = $StudentLoanDetail;
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