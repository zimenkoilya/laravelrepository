<?php

namespace App\Repositories;

use App\Models\AnetCustomerProfile;

class AnetCustomerProfileRepository
{
    use BaseRepository;

    /**
     * AnetCustomerProfile Model
     *
     * @var AnetCustomerProfile
     */
    protected $model;

    /**
     * Constructor
     *
     * @param AnetCustomerProfile $anetCustomerProfile
     */
    public function __construct(AnetCustomerProfile $anetCustomerProfile)
    {
        $this->model = $anetCustomerProfile;
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
                    $query->where('profile_id', 'like', "%{$keyword}%")
                          ->orWhere('case_id', 'like', "%{$keyword}%");
                })
                ->orderBy($sortColumn, $sort)
                ->paginate($number);
    }
}