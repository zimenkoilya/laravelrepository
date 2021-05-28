<?php

namespace App\Repositories;

use App\Models\Export;

class ExportRepository
{
    use BaseRepository;

    /**
     * Export Model
     *
     * @var Export
     */
    protected $model;

    /**
     * Constructor
     *
     * @param Export $export
     */
    public function __construct(Export $export)
    {
        $this->model = $export;
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
                          ->orWhere('url', 'like', "%{$keyword}%")
                          ->orWhere('type', 'like', "%{$keyword}%")
                          ->orWhere('data_template', 'like', "%{$keyword}%");
                })
                ->orderBy($sortColumn, $sort)
                ->paginate($number);
    }
}