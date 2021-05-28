<?php

namespace App\Repositories;

use App\Models\TrustEft;

class TrustEftRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var TrustEft
     */
    protected $model;

    /**
     * Constructor
     *
     * @param TrustEft $TrustEft
     */
    public function __construct(TrustEft $TrustEft)
    {
        $this->model = $TrustEft;
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
    public function pageWithRequest($request, $number = 10, $sort = 'asc', $sortColumn = 'created_date')
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