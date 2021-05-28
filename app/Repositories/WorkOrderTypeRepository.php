<?php

namespace App\Repositories;

use App\Models\WorkOrderType;

class WorkOrderTypeRepository
{
    use BaseRepository;

    /**
     * AccountingStatus Model
     *
     * @var WorkOrderType
     */
    protected $model;

    /**
     * Constructor
     *
     * @param WorkOrderType $workOrderType
     */
    public function __construct(WorkOrderType $workOrderType)
    {
        $this->model = $workOrderType;
    }

    /**
     * Get the WorkOrderType by name.
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

        return $this->model->orderBy($sortColumn, $sort)
                ->paginate($number);
    }
}