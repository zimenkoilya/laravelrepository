<?php

namespace App\Repositories;

use App\Models\Wallboard;

class WallboardRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var Wallboard
     */
    protected $model;

    /**
     * Constructor
     *
     * @param Wallboard $Wallboard
     */
    public function __construct(Wallboard $Wallboard)
    {
        $this->model = $Wallboard;
    }


    public function getByName($name){
        return $this->model->where('name', $name)->first();
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
    public function pageWithRequest($request, $number = 10, $sort = 'asc', $sortColumn = 'updated')
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