<?php

namespace App\Repositories;

use App\Models\SystemEvent;

class SystemEventRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var SystemEvent
     */
    protected $model;

    /**
     * Constructor
     *
     * @param SystemEvent $SystemEvent
     */
    public function __construct(SystemEvent $SystemEvent)
    {
        $this->model = $SystemEvent;
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
    public function pageWithRequest($request, $number = 10, $sort = 'asc', $sortColumn = 'id')
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