<?php

namespace App\Repositories;

use App\Models\WalletTransaction;

class WalletTransactionRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var WalletTransaction
     */
    protected $model;

    /**
     * Constructor
     *
     * @param WalletTransaction $WalletTransaction
     */
    public function __construct(WalletTransaction $WalletTransaction)
    {
        $this->model = $WalletTransaction;
    }

    public function all(){
        $this->model->get();
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