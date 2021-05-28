<?php

namespace App\Repositories;

use App\Models\WorkOrderStatus;

class WorkOrderStatusRepository
{
    use BaseRepository;

    /**
     * AccountingStatus Model
     *
     * @var WorkOrderStatus
     */
    protected $model;

    /**
     * Constructor
     *
     * @param WorkOrderStatus $workOrderStatus
     */
    public function __construct(WorkOrderStatus $workOrderStatus)
    {
        $this->model = $workOrderStatus;
    }

    /**
     * Get the WorkOrderStatus by name.
     *
     * @param  string $name
     * @return mixed
     */
    public function getByName($name)
    {
        return $this->model
                    ->where('name', $name)
                    ->first();
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