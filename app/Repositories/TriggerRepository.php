<?php

namespace App\Repositories;

use App\Models\Trigger;

class TriggerRepository
{
    use BaseRepository;

    /**
     * Trigger Model
     *
     * @var Trigger
     */
    protected $model;

    /**
     * Constructor
     *
     * @param Trigger $trigger
     */
    public function __construct(Trigger $trigger)
    {
        $this->model = $trigger;
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

        return $this->model->orderBy($sortColumn, $sort)->paginate($number);
    }
}