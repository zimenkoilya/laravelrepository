<?php

namespace App\Repositories;

use App\Models\StudentQuoteFactor;

class StudentQuoteFactorRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var StudentQuoteFactor
     */
    protected $model;

    /**
     * Constructor
     *
     * @param StudentQuoteFactor $StudentQuoteFactor
     */
    public function __construct(StudentQuoteFactor $StudentQuoteFactor)
    {
        $this->model = $StudentQuoteFactor;
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