<?php

namespace App\Repositories;

use App\Models\Bulletin;

class BulletinRepository
{
    use BaseRepository;

    /**
     * Bulletin Model
     *
     * @var Bulletin
     */
    protected $model;

    /**
     * Constructor
     *
     * @param Bulletin $bulletin
     */
    public function __construct(Bulletin $bulletin)
    {
        $this->model = $bulletin;
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
    public function pageWithRequest($request, $number = 10, $sort = 'desc', $sortColumn = 'status_updated_at')
    {
        $keyword = $request->get('keyword');

        if ($request->has('limit')) {
            $number = $request->get('limit');
        }

        return $this->model->when($keyword, function ($query) use ($keyword) {
                    $query->where('status', 'like', "%{$keyword}%");
                })
                ->orderBy($sortColumn, $sort)
                ->paginate($number);
    }
}