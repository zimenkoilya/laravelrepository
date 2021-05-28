<?php

namespace App\Repositories;

use App\Models\Snapshot;

class SnapshotRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var Snapshot
     */
    protected $model;

    /**
     * Constructor
     *
     * @param Snapshot $Snapshot
     */
    public function __construct(Snapshot $Snapshot)
    {
        $this->model = $Snapshot;
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
        return $this->model->when($keyword, function ($query) use ($keyword) {
            $query->where('name', 'like', "%{$keyword}%")
            ->orWhere('description', 'like', "%{$keyword}%");
        })
        ->orderBy($sortColumn, $sort)
        ->paginate($number);
    }
}