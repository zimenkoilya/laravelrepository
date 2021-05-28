<?php

namespace App\Repositories;

use App\Models\TimeclockReport;

class TimeclockReportRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var TimeclockReport
     */
    protected $model;

    /**
     * Constructor
     *
     * @param TimeclockReport $TimeclockReport
     */
    public function __construct(TimeclockReport $TimeclockReport)
    {
        $this->model = $TimeclockReport;
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
    public function pageWithRequest($request, $number = 10, $sort = 'asc', $sortColumn = 'date')
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