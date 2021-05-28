<?php

namespace App\Repositories;

use App\Models\WalletCard;

class WalletCardRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var WalletCard
     */
    protected $model;

    /**
     * Constructor
     *
     * @param WalletCard $WalletCard
     */
    public function __construct(WalletCard $WalletCard)
    {
        $this->model = $WalletCard;
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
        return $this->model->when($keyword, function ($query) use ($keyword) {
            $query->where('name_on_card', 'like', "%{$keyword}%")
            ->orWhere('card_type', 'like', "%{$keyword}%");
        })
        ->orderBy($sortColumn, $sort)
        ->paginate($number);
    }
}