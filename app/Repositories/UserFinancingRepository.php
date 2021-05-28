<?php

namespace App\Repositories;

use App\Models\UserFinancing;

class UserFinancingRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var UserFinancing
     */
    protected $model;

    /**
     * Constructor
     *
     * @param UserFinancing $UserFinancing
     */
    public function __construct(UserFinancing $UserFinancing)
    {
        $this->model = $UserFinancing;
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
    public function pageWithRequest($request, $number = 10, $sort = 'asc', $sortColumn = 'user_id')
    {
        $keyword = $request->get('keyword');

        if ($request->has('limit')) {
            $number = $request->get('limit');
        }
        return $this->model
        ->orderBy($sortColumn, $sort)
        ->paginate($number);
    }
}