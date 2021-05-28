<?php

namespace App\Repositories;

use App\Models\WorkOrder;

class WorkOrderRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var WorkOrder
     */
    protected $model;

    /**
     * Constructor
     *
     * @param WorkOrder $workOrder
     */
    public function __construct(WorkOrder $workOrder)
    {
        $this->model = $workOrder;
    }

    /**
     * Get the WorkOrder by all.
     *
     * @param  string $name
     * @return mixed
     */
    public function all()
    {
        return $this->model->orderBy('name','asc')->get();
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
    public function pageWithRequest($request, $number = 10, $sort = 'asc', $sortColumn = 'created')
    {
        $keyword = $request->get('keyword');

        if ($request->has('limit')) {
            $number = $request->get('limit');
        }
        return $this->model->when($keyword, function ($query) use ($keyword) {
            $query->where('title', 'like', "%{$keyword}%")
                ->orWhere('provider', 'like', "%{$keyword}%")
                ->orWhere('notes', 'like', "%{$keyword}%")
                ->orWhere('provider_number', 'like', "%{$keyword}%");
        })
        ->orderBy($sortColumn, $sort)
        ->paginate($number);
    }
}