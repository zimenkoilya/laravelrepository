<?php

namespace App\Repositories;

use App\Models\ScriptNodeLog;

class ScriptNodeLogRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var ScriptNodeLog
     */
    protected $model;

    /**
     * Constructor
     *
     * @param ScriptNodeLog $ScriptNodeLog
     */
    public function __construct(ScriptNodeLog $ScriptNodeLog)
    {
        $this->model = $ScriptNodeLog;
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