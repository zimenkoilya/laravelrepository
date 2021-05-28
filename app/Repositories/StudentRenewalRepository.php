<?php

namespace App\Repositories;

use App\Models\StudentRenewal;

class StudentRenewalRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var StudentRenewal
     */
    protected $model;

    /**
     * Constructor
     *
     * @param StudentRenewal $StudentRenewal
     */
    public function __construct(StudentRenewal $StudentRenewal)
    {
        $this->model = $StudentRenewal;
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