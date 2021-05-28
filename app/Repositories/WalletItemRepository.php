<?php

namespace App\Repositories;

use App\Models\WalletItem;

class WalletItemRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var WalletItem
     */
    protected $model;

    /**
     * Constructor
     *
     * @param WalletItem $WalletItem
     */
    public function __construct(WalletItem $WalletItem)
    {
        $this->model = $WalletItem;
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
    public function pageWithRequest($request, $number = 10, $sort = 'asc', $sortColumn = 'name')
    {
        $keyword = $request->get('keyword');

        if ($request->has('limit')) {
            $number = $request->get('limit');
        }
        return $this->model->when($keyword, function ($query) use ($keyword) {
            $query->where('name', 'like', "%{$keyword}%");
        })
        ->orderBy($sortColumn, $sort)
        ->paginate($number);
    }
}