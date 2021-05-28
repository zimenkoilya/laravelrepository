<?php

namespace App\Repositories;

use App\Models\BillingVerifyStatus;

class BillingVerifyStatusRepository
{
    use BaseRepository;

    /**
     * BillingVerifyStatus Model
     *
     * @var BillingVerifyStatus
     */
    protected $model;

    /**
     * Constructor
     *
     * @param BillingVerifyStatus $billingVerifyStatus
     */
    public function __construct(BillingVerifyStatus $billingVerifyStatus)
    {
        $this->model = $billingVerifyStatus;
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