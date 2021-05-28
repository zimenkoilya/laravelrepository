<?php

namespace App\Repositories;

use App\Models\TemplateTodo;

class TemplateTodoRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var TemplateTodo
     */
    protected $model;

    /**
     * Constructor
     *
     * @param TemplateTodo $TemplateTodo
     */
    public function __construct(TemplateTodo $TemplateTodo)
    {
        $this->model = $TemplateTodo;
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
    public function pageWithRequest($request, $number = 10, $sort = 'asc', $sortColumn = 'name')
    {
        $keyword = $request->get('keyword');

        if ($request->has('limit')) {
            $number = $request->get('limit');
        }
        return $this->model->when($keyword, function ($query) use ($keyword) {
            $query->where('name', 'like', "%{$keyword}%")
            ->orWhere('description', 'like', "%{$keyword}%");
        })
        ->orderBy($sortColumn, $sort)
        ->paginate($number);
    }
}