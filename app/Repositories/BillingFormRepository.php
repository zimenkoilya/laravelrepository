<?php

namespace App\Repositories;

use App\Models\BillingForm;

class BillingFormRepository
{
    use BaseRepository;

    /**
     * BillingForm Model
     *
     * @var BillingForm
     */
    protected $model;

    /**
     * Constructor
     *
     * @param BillingForm $billingForm
     */
    public function __construct(BillingForm $billingForm)
    {
        $this->model = $billingForm;
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
                    $query->where('phone', 'like', "%{$keyword}%")
                          ->orWhere('email', 'like', "%{$keyword}%")
                          ->orWhere('uuid', 'like', "%{$keyword}%")
                          ->orWhere('token', 'like', "%{$keyword}%")
                          ->orWhere('billing_type', 'like', "%{$keyword}%")
                          ->orWhere('send_type', 'like', "%{$keyword}%");
                })
                ->orderBy($sortColumn, $sort)
                ->paginate($number);
    }
}