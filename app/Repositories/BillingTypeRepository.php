<?php

namespace App\Repositories;

use App\Models\BillingType;

class BillingTypeRepository
{
    use BaseRepository;

    /**
     * BillingType Model
     *
     * @var BillingType
     */
    protected $model;

    /**
     * Constructor
     *
     * @param BillingType $billingType
     */
    public function __construct(BillingType $billingType)
    {
        $this->model = $billingType;
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