<?php

namespace App\Repositories;

use App\Models\SharedCase;

class SharedCaseRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var SharedCase
     */
    protected $model;

    /**
     * Constructor
     *
     * @param SharedCase $SharedCase
     */
    public function __construct(SharedCase $SharedCase)
    {
        $this->model = $SharedCase;
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