<?php

namespace App\Repositories;

use App\Models\StudentService;

class StudentServiceRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var StudentService
     */
    protected $model;

    /**
     * Constructor
     *
     * @param StudentService $StudentService
     */
    public function __construct(StudentService $StudentService)
    {
        $this->model = $StudentService;
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