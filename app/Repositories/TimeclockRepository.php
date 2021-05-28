<?php

namespace App\Repositories;

use App\Models\Timeclock;

class TimeclockRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var Timeclock
     */
    protected $model;

    /**
     * Constructor
     *
     * @param Timeclock $Timeclock
     */
    public function __construct(Timeclock $Timeclock)
    {
        $this->model = $Timeclock;
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
    public function pageWithRequest($request, $number = 10, $sort = 'asc', $sortColumn = 'id')
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