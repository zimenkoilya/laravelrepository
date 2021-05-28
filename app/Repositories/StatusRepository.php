<?php

namespace App\Repositories;

use App\Models\Status;

class StatusRepository
{
    use BaseRepository;

    /**
     * Status Model
     *
     * @var Status
     */
    protected $model;

    /**
     * Constructor
     *
     * @param Status $status
     */
    public function __construct(Status $status)
    {
        $this->model = $status;
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
                          ->orWhere('description', 'like', "%{$keyword}%");
                })
                ->where('milestone_id', '<>', 0)
                ->whereNotNull('milestone_id')
                ->orderBy('name', 'asc')
                ->orderBy($sortColumn, $sort)
                ->paginate($number);
    }
}