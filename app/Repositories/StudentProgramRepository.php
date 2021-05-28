<?php

namespace App\Repositories;

use App\Models\StudentProgram;

class StudentProgramRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var StudentProgram
     */
    protected $model;

    /**
     * Constructor
     *
     * @param StudentProgram $StudentProgram
     */
    public function __construct(StudentProgram $StudentProgram)
    {
        $this->model = $StudentProgram;
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