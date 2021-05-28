<?php

namespace App\Repositories;

use App\Models\TriggerLog;

class TriggerLogRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var TriggerLog
     */
    protected $model;

    /**
     * Constructor
     *
     * @param TriggerLog $TriggerLog
     */
    public function __construct(TriggerLog $TriggerLog)
    {
        $this->model = $TriggerLog;
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
    public function pageWithRequest($request, $number = 10, $sort = 'asc', $sortColumn = 'created_at')
    {
        $keyword = $request->get('keyword');

        if ($request->has('limit')) {
            $number = $request->get('limit');
        }
        return $this->model->when($keyword, function ($query) use ($keyword) {
            $query->where('details', 'like', "%{$keyword}%")
            ->orWhere('result', 'like', "%{$keyword}%");
        })
        ->orderBy($sortColumn, $sort)
        ->paginate($number);
    }
}