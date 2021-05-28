<?php

namespace App\Repositories;

use App\Models\ScriptNodeSession;

class ScriptNodeSessionRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var ScriptNodeSession
     */
    protected $model;

    /**
     * Constructor
     *
     * @param ScriptNodeSession $ScriptNodeSession
     */
    public function __construct(ScriptNodeSession $ScriptNodeSession)
    {
        $this->model = $ScriptNodeSession;
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