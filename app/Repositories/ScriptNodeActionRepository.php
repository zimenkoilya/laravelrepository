<?php

namespace App\Repositories;

use App\Models\ScriptNodeAction;

class ScriptNodeActionRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var ScriptNodeAction
     */
    protected $model;

    /**
     * Constructor
     *
     * @param ScriptNodeAction $ScriptNodeAction
     */
    public function __construct(ScriptNodeAction $ScriptNodeAction)
    {
        $this->model = $ScriptNodeAction;
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