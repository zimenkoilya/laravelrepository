<?php

namespace App\Repositories;

use App\Models\Sms;

class SmsRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var Sms
     */
    protected $model;

    /**
     * Constructor
     *
     * @param Sms $Sms
     */
    public function __construct(Sms $Sms)
    {
        $this->model = $Sms;
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