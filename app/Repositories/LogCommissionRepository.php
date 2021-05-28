<?php

namespace App\Repositories;

use App\Models\LogCommission;

class LogCommissionRepository
{
    use BaseRepository;

    /**
     * LogCommission Model
     *
     * @var LogCommission
     */
    protected $model;

    /**
     * Constructor
     *
     * @param LogCommission $LogCommission
     */
    public function __construct(LogCommission $LogCommission)
    {
        $this->model = $LogCommission;
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