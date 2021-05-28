<?php

namespace App\Repositories;

use App\Models\Areacode;

class AreacodeRepository
{
    use BaseRepository;

    /**
     * Areacode Model
     *
     * @var Areacode
     */
    protected $model;

    /**
     * Constructor
     *
     * @param Areacode $areacode
     */
    public function __construct(Areacode $areacode)
    {
        $this->model = $areacode;
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
    public function pageWithRequest($request, $number = 10, $sort = 'asc', $sortColumn = 'area_code')
    {
        $keyword = $request->get('keyword');

        if ($request->has('limit')) {
            $number = $request->get('limit');
        }

        return $this->model->when($keyword, function ($query) use ($keyword) {
                    $query->where('area_code', 'like', "%{$keyword}%")
                          ->orWhere('Region', 'like', "%{$keyword}%")
                          ->orWhere('Description', 'like', "%{$keyword}%");
                })
                ->orderBy($sortColumn, $sort)
                ->paginate($number);
    }
}