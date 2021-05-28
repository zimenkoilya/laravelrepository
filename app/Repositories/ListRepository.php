<?php

namespace App\Repositories;

use App\Models\Lists;
use Auth;

class ListRepository
{
    use BaseRepository;

    /**
     * List Model
     *
     * @var Lists
     */
    protected $model;

    /**
     * Constructor
     *
     * @param List $list
     */
    public function __construct(Lists $list)
    {
        $this->model = $list;
    }

    /**
     * Get the list by type.
     *
     * @param  string $type
     * @return mixed
     */
    public function getByType($type)
    {
        return $this->model
                    ->where('created_by', Auth::id())
                    ->where('type', $type)
                    ->get();
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
                          ->orWhere('type', 'like', "%{$keyword}%")
                          ->orWhere('description', 'like', "%{$keyword}%");
                })
                ->orderBy($sortColumn, $sort)
                ->paginate($number);
    }
}