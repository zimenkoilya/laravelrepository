<?php

namespace App\Repositories;

use App\Models\Billing;

class BillingRepository
{
    use BaseRepository;

    /**
     * Billing Model
     *
     * @var Billing
     */
    protected $model;

    /**
     * Constructor
     *
     * @param Billing $billing
     */
    public function __construct(Billing $billing)
    {
        $this->model = $billing;
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
                    $query->where('title', 'like', "%{$keyword}%")
                          ->orWhere('type', 'like', "%{$keyword}%");
                })
                ->orderBy($sortColumn, $sort)
                ->paginate($number);
    }
}