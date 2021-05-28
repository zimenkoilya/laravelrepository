<?php

namespace App\Repositories;

use App\Models\BillingFormEvent;

class BillingFormEventRepository
{
    use BaseRepository;

    /**
     * BillingFormEvent Model
     *
     * @var BillingFormEvent
     */
    protected $model;

    /**
     * Constructor
     *
     * @param BillingFormEvent $billingFormEvent
     */
    public function __construct(BillingFormEvent $billingFormEvent)
    {
        $this->model = $billingFormEvent;
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
                    $query->where('event', 'like', "%{$keyword}%");
                })
                ->orderBy($sortColumn, $sort)
                ->paginate($number);
    }
}