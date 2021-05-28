<?php

namespace App\Repositories;

use App\Models\Milestone;

class MilestoneRepository
{
    use BaseRepository;

    /**
     * Milestone Model
     *
     * @var Milestone
     */
    protected $model;

    /**
     * Constructor
     *
     * @param Milestone $milestone
     */
    public function __construct(Milestone $milestone)
    {
        $this->model = $milestone;
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
                    $query->where('name', 'like', "%{$keyword}%");
                })
                ->orderBy($sortColumn, $sort)
                ->paginate($number);
    }
}