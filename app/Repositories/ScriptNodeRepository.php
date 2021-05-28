<?php

namespace App\Repositories;

use App\Models\ScriptNode;

class ScriptNodeRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var ScriptNode
     */
    protected $model;

    /**
     * Constructor
     *
     * @param ScriptNode $ScriptNode
     */
    public function __construct(ScriptNode $ScriptNode)
    {
        $this->model = $ScriptNode;
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