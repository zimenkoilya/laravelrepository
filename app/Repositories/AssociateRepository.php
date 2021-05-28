<?php

namespace App\Repositories;

use App\Models\Associate;

class AssociateRepository
{
    use BaseRepository;

    /**
     * Associate Model
     *
     * @var Associate
     */
    protected $model;

    /**
     * Constructor
     *
     * @param Associate $associate
     */
    public function __construct(Associate $associate)
    {
        $this->model = $associate;
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
                    $query->where('name', 'like', "%{$keyword}%");
                })
                ->orderBy($sortColumn, $sort)
                ->paginate($number);
    }
}