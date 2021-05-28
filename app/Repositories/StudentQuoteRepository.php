<?php

namespace App\Repositories;

use App\Models\StudentQuote;

class StudentQuoteRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var StudentQuote
     */
    protected $model;

    /**
     * Constructor
     *
     * @param StudentQuote $StudentQuote
     */
    public function __construct(StudentQuote $StudentQuote)
    {
        $this->model = $StudentQuote;
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