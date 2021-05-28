<?php

namespace App\Repositories;

use App\Models\StudentLender;

class StudentLenderRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var StudentLender
     */
    protected $model;

    /**
     * Constructor
     *
     * @param StudentLender $StudentLender
     */
    public function __construct(StudentLender $StudentLender)
    {
        $this->model = $StudentLender;
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
            ->orWhere('street', 'like', "%{$keyword}%")
            ->orWhere('city', 'like', "%{$keyword}%");
        })
        ->orderBy($sortColumn, $sort)
        ->paginate($number);
    }
}