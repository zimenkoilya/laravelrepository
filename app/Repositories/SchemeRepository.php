<?php

namespace App\Repositories;

use App\Models\Scheme;

class SchemeRepository
{
    use BaseRepository;

    /**
     * Scheme Model
     *
     * @var Scheme
     */
    protected $model;

    /**
     * Constructor
     *
     * @param Scheme $scheme
     */
    public function __construct(Scheme $scheme)
    {
        $this->model = $scheme;
    }

    /**
     * Get the list of all the Scheme without myself.
     *
     * @return mixed
     */
    public function getList()
    {
        return $this->model
            ->orderBy('id', 'desc')
            ->get();
    }

    /**
     * Get the Scheme by name.
     *
     * @param  string $name
     * @return mixed
     */
    public function getByName($name)
    {
        return $this->model
                    ->where('name', $name)
                    ->first();
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
                          ->orWhere('context', 'like', "%{$keyword}%")
                          ->orWhere('content', 'like', "%{$keyword}%");
                })
                ->orderBy($sortColumn, $sort)
                ->paginate($number);
    }
}