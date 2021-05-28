<?php

namespace App\Repositories;

use App\Models\Service;

class ServiceRepository
{
    use BaseRepository;

    /**
     * Service Model
     *
     * @var Service
     */
    protected $model;

    /**
     * Constructor
     *
     * @param Service $service
     */
    public function __construct(Service $service)
    {
        $this->model = $service;
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
    public function pageWithRequest($request, $number = 10, $sort = 'asc', $sortColumn = 'name')
    {
        $keyword = $request->get('keyword');

        if ($request->has('limit')) {
            $number = $request->get('limit');
        }

        return $this->model->when($keyword, function ($query) use ($keyword) {
                    $query->where('name', 'like', "%{$keyword}%");
                })
                ->orderBy($sortColumn, $sort)
                ->paginate($number);
    }
}