<?php

namespace App\Repositories;

use App\Models\TrustAccount;

class TrustAccountRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var TrustAccount
     */
    protected $model;

    /**
     * Constructor
     *
     * @param TrustAccount $TrustAccount
     */
    public function __construct(TrustAccount $TrustAccount)
    {
        $this->model = $TrustAccount;
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