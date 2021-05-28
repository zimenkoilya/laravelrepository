<?php

namespace App\Repositories;

use App\Models\Call;

class CallRepository
{
    use BaseRepository;

    /**
     * Call Model
     *
     * @var Call
     */
    protected $model;

    /**
     * Constructor
     *
     * @param Call $call
     */
    public function __construct(Call $call)
    {
        $this->model = $call;
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