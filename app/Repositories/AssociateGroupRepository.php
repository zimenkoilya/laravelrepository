<?php

namespace App\Repositories;

use App\Models\AssociateGroup;

class AssociateGroupRepository
{
    use BaseRepository;

    /**
     * AssociateGroup Model
     *
     * @var AssociateGroup
     */
    protected $model;

    /**
     * Constructor
     *
     * @param AssociateGroup $associateGroup
     */
    public function __construct(AssociateGroup $associateGroup)
    {
        $this->model = $associateGroup;
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
                    $query->where('group_name', 'like', "%{$keyword}%");
                })
                ->orderBy($sortColumn, $sort)
                ->paginate($number);
    }
}