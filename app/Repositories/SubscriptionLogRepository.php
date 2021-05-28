<?php

namespace App\Repositories;

use App\Models\SubscriptionLog;

class SubscriptionLogRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var SubscriptionLog
     */
    protected $model;

    /**
     * Constructor
     *
     * @param SubscriptionLog $SubscriptionLog
     */
    public function __construct(SubscriptionLog $SubscriptionLog)
    {
        $this->model = $SubscriptionLog;
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