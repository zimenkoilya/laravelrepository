<?php

namespace App\Repositories;

use App\Models\StatusLabel;

class StatusLabelRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var StatusLabel
     */
    protected $model;

    /**
     * Constructor
     *
     * @param StatusLabel $StatusLabel
     */
    public function __construct(StatusLabel $StatusLabel)
    {
        $this->model = $StatusLabel;
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
        return $this->model->when($keyword, function ($query) use ($keyword) {
            $query->where('name', 'like', "%{$keyword}%");
        })
        ->orderBy($sortColumn, $sort)
        ->paginate($number);
    }
}