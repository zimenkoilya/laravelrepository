<?php

namespace App\Repositories;

use App\Models\TaskEvent;

class TaskEventRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var TaskEvent
     */
    protected $model;

    /**
     * Constructor
     *
     * @param TaskEvent $TaskEvent
     */
    public function __construct(TaskEvent $TaskEvent)
    {
        $this->model = $TaskEvent;
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
    public function pageWithRequest($request, $number = 10, $sort = 'asc', $sortColumn = 'title')
    {
        $keyword = $request->get('keyword');

        if ($request->has('limit')) {
            $number = $request->get('limit');
        }
        return $this->model->when($keyword, function ($query) use ($keyword) {
            $query->where('title', 'like', "%{$keyword}%")
            ->orWhere('label', 'like', "%{$keyword}%");
        })
        ->orderBy($sortColumn, $sort)
        ->paginate($number);
    }
}