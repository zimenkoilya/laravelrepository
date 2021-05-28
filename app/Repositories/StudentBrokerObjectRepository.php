<?php

namespace App\Repositories;

use App\Models\StudentBrokerObject;

class StudentBrokerObjectRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var StudentBrokerObject
     */
    protected $model;

    /**
     * Constructor
     *
     * @param StudentBrokerObject $StudentBrokerObject
     */
    public function __construct(StudentBrokerObject $StudentBrokerObject)
    {
        $this->model = $StudentBrokerObject;
    }

    public function getByName($name){
        return $this->model->where('name', $name)->first();
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
            $query->where('name', 'like', "%{$keyword}%")
            ->orWhere('type', 'like', "%{$keyword}%")
            ->orWhere('key', 'like', "%{$keyword}%");
        })
        ->orderBy($sortColumn, $sort)
        ->paginate($number);
    }
}