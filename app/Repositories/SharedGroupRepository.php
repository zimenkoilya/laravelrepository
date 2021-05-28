<?php

namespace App\Repositories;

use App\Models\SharedGroup;

class SharedGroupRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var SharedGroup
     */
    protected $model;

    /**
     * Constructor
     *
     * @param SharedGroup $SharedGroup
     */
    public function __construct(SharedGroup $SharedGroup)
    {
        $this->model = $SharedGroup;
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