<?php

namespace App\Repositories;

use App\Models\TriggerTask;

class TriggerTaskRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var TriggerTask
     */
    protected $model;

    /**
     * Constructor
     *
     * @param TriggerTask $TriggerTask
     */
    public function __construct(TriggerTask $TriggerTask)
    {
        $this->model = $TriggerTask;
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