<?php

namespace App\Repositories;

use App\Models\CaseAdditional;

class CaseAdditionalRepository
{
    use BaseRepository;

    /**
     * CaseAdditional Model
     *
     * @var CaseAdditional
     */
    protected $model;

    /**
     * Constructor
     *
     * @param CaseAdditional $CaseAdditional
     */
    public function __construct(CaseAdditional $CaseAdditional)
    {
        $this->model = $CaseAdditional;
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
    public function pageWithRequest($request, $number = 10, $sort = 'desc', $sortColumn = 'created_at')
    {
        $keyword = $request->get('keyword');

        if ($request->has('limit')) {
            $number = $request->get('limit');
        }

        return $this->model->when($keyword, function ($query) use ($keyword) {
                    $query->where('name', 'like', "%{$keyword}%")
                          ->orWhere('description', 'like', "%{$keyword}%");
                })
                ->orderBy($sortColumn, $sort)
                ->paginate($number);
    }
}