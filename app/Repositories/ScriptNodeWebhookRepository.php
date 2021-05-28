<?php

namespace App\Repositories;

use App\Models\webhook_type;

class webhook_typeRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var webhook_type
     */
    protected $model;

    /**
     * Constructor
     *
     * @param webhook_type $webhook_type
     */
    public function __construct(webhook_type $webhook_type)
    {
        $this->model = $webhook_type;
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