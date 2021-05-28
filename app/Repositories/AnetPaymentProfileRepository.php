<?php

namespace App\Repositories;

use App\Models\AnetPaymentProfile;

class AnetPaymentProfileRepository
{
    use BaseRepository;

    /**
     * AnetPaymentProfile Model
     *
     * @var AnetPaymentProfile
     */
    protected $model;

    /**
     * Constructor
     *
     * @param AnetPaymentProfile $anetPaymentProfile
     */
    public function __construct(AnetPaymentProfile $anetPaymentProfile)
    {
        $this->model = $anetPaymentProfile;
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
                    $query->where('customer_profile_id', 'like', "%{$keyword}%")
                          ->orWhere('payment_profile_id', 'like', "%{$keyword}%")
                          ->orWhere('case_id', 'like', "%{$keyword}%");
                })
                ->orderBy($sortColumn, $sort)
                ->paginate($number);
    }
}