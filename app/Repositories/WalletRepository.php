<?php

namespace App\Repositories;

use App\Models\Wallet;

class WalletRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var Wallet
     */
    protected $model;

    /**
     * Constructor
     *
     * @param Wallet $Wallet
     */
    public function __construct(Wallet $Wallet)
    {
        $this->model = $Wallet;
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