<?php

namespace App\Repositories;

use App\Models\TrustTransaction;

class TrustTransactionRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var TrustTransaction
     */
    protected $model;

    /**
     * Constructor
     *
     * @param TrustTransaction $TrustTransaction
     */
    public function __construct(TrustTransaction $TrustTransaction)
    {
        $this->model = $TrustTransaction;
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
    public function pageWithRequest($request, $number = 10, $sort = 'asc', $sortColumn = 'created')
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