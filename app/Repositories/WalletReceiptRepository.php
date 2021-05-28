<?php

namespace App\Repositories;

use App\Models\WalletReceipt;

class WalletReceiptRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var WalletReceipt
     */
    protected $model;

    /**
     * Constructor
     *
     * @param WalletReceipt $WalletReceipt
     */
    public function __construct(WalletReceipt $WalletReceipt)
    {
        $this->model = $WalletReceipt;
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