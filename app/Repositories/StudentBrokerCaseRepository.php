<?php

namespace App\Repositories;

use App\Models\StudentBrokerCase;

class StudentBrokerCaseRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var StudentBrokerCase
     */
    protected $model;

    /**
     * Constructor
     *
     * @param StudentBrokerCase $StudentBrokerCase
     */
    public function __construct(StudentBrokerCase $StudentBrokerCase)
    {
        $this->model = $StudentBrokerCase;
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