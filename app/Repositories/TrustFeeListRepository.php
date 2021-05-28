<?php

namespace App\Repositories;

use App\Models\TrustFeeList;

class TrustFeeListRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var TrustFeeList
     */
    protected $model;

    /**
     * Constructor
     *
     * @param TrustFeeList $TrustFeeList
     */
    public function __construct(TrustFeeList $TrustFeeList)
    {
        $this->model = $TrustFeeList;
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
    public function pageWithRequest($request, $number = 10, $sort = 'asc', $sortColumn = 'fee_date')
    {
        $keyword = $request->get('keyword');

        if ($request->has('limit')) {
            $number = $request->get('limit');
        }
        return $this->model->when($keyword, function ($query) use ($keyword) {
            $query->where('party', 'like', "%{$keyword}%")
            ->orWhere('description', 'like', "%{$keyword}%")
            ->orWhere('fee_type', 'like', "%{$keyword}%");
        })
        ->orderBy($sortColumn, $sort)
        ->paginate($number);
    }
}