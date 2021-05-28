<?php

namespace App\Repositories;

use App\Models\SmsNumber;

class SmsNumberRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var SmsNumber
     */
    protected $model;

    /**
     * Constructor
     *
     * @param SmsNumber $SmsNumber
     */
    public function __construct(SmsNumber $SmsNumber)
    {
        $this->model = $SmsNumber;
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