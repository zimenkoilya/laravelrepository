<?php

namespace App\Repositories;

use App\Models\BillingVerify;

class BillingVerifyRepository
{
    use BaseRepository;

    /**
     * BillingVerify Model
     *
     * @var BillingVerify
     */
    protected $model;

    /**
     * Constructor
     *
     * @param BillingVerify $billingVerify
     */
    public function __construct(BillingVerify $billingVerify)
    {
        $this->model = $billingVerify;
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
    public function pageWithRequest($request, $number = 10, $sort = 'desc', $sortColumn = 'created_at')
    {
        $keyword = $request->get('keyword');

        if ($request->has('limit')) {
            $number = $request->get('limit');
        }

        return $this->model->when($keyword, function ($query) use ($keyword) {
                    $query->where('reference_id', 'like', "%{$keyword}%")
                          ->orWhere('service', 'like', "%{$keyword}%")
                          ->orWhere('response', 'like', "%{$keyword}%")
                          ->orWhere('code', 'like', "%{$keyword}%");
                })
                ->orderBy($sortColumn, $sort)
                ->paginate($number);
    }
}