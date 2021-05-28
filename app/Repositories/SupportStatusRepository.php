<?php

namespace App\Repositories;

use App\Models\SupportStatus;

class SupportStatusRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var SupportStatus
     */
    protected $model;

    /**
     * Constructor
     *
     * @param SupportStatus $SupportStatus
     */
    public function __construct(SupportStatus $SupportStatus)
    {
        $this->model = $SupportStatus;
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
            $query->where('status_name', 'like', "%{$keyword}%");
        })
        ->orderBy($sortColumn, $sort)
        ->paginate($number);
    }
}