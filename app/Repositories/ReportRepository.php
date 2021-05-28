<?php

namespace App\Repositories;

use App\Models\Report;

class ReportRepository
{
    use BaseRepository;

    /**
     * Report Model
     *
     * @var Report
     */
    protected $model;

    /**
     * Constructor
     *
     * @param Report $campaign_group
     */
    public function __construct(Report $Report)
    {
        $this->model = $Report;
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