<?php

namespace App\Repositories;

use App\Models\Setting;

class SettingRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var Setting
     */
    protected $model;

    /**
     * Constructor
     *
     * @param Setting $Setting
     */
    public function __construct(Setting $Setting)
    {
        $this->model = $Setting;
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