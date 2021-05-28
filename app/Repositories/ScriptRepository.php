<?php

namespace App\Repositories;

use App\Models\Script;

class ScriptRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var Script
     */
    protected $model;

    /**
     * Constructor
     *
     * @param Script $Script
     */
    public function __construct(Script $Script)
    {
        $this->model = $Script;
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