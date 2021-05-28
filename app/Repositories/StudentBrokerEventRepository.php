<?php

namespace App\Repositories;

use App\Models\StudentBrokerEvent;

class StudentBrokerEventRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var StudentBrokerEvent
     */
    protected $model;

    /**
     * Constructor
     *
     * @param StudentBrokerEvent $StudentBrokerEvent
     */
    public function __construct(StudentBrokerEvent $StudentBrokerEvent)
    {
        $this->model = $StudentBrokerEvent;
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