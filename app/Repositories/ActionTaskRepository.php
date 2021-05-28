<?php

namespace App\Repositories;

use App\Models\ActionTask;

class ActionTaskRepository
{
    use BaseRepository;

    /**
     * ActionTask Model
     *
     * @var ActionTask
     */
    protected $model;

    /**
     * Constructor
     *
     * @param ActionTask $actionGroup
     */
    public function __construct(ActionTask $model)
    {
        $this->model = $model;
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
    public function pageWithRequest($request, $number = 10, $sort = 'desc', $sortColumn = 'created_at')
    {
        $keyword = $request->get('keyword');

        if ($request->has('limit')) {
            $number = $request->get('limit');
        }

        return $this->model->when($keyword, function ($query) use ($keyword) {
                    $query->where('name', 'like', "%{$keyword}%")
                          ->orWhere('label', 'like', "%{$keyword}%")
                          ->orWhere('options_table', 'like', "%{$keyword}%");
                })
                ->orderBy($sortColumn, $sort)
                ->paginate($number);
    }
}