<?php

namespace App\Repositories;

use App\Models\WalletInvoice;

class WalletInvoiceRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var WalletInvoice
     */
    protected $model;

    /**
     * Constructor
     *
     * @param WalletInvoice $WalletInvoice
     */
    public function __construct(WalletInvoice $WalletInvoice)
    {
        $this->model = $WalletInvoice;
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