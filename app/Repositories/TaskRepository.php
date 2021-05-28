<?php

namespace App\Repositories;

use App\Models\Task;

class TaskRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var Task
     */
    protected $model;

    /**
     * Constructor
     *
     * @param Task $Task
     */
    public function __construct(Task $Task)
    {
        $this->model = $Task;
    }

    public function getByName($name){
        return $this->model->where('name', $name)->first();
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
    public function pageWithRequest($request, $number = 10, $sort = 'asc', $sortColumn = 'company_id')
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