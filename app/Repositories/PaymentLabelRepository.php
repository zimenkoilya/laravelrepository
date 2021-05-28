<?php

namespace App\Repositories;

use App\Models\PaymentLabel;

class PaymentLabelRepository
{
    use BaseRepository;

    /**
     * PaymentLabel Model
     *
     * @var PaymentLabel
     */
    protected $model;

    /**
     * Constructor
     *
     * @param PaymentLabel $PaymentLabel
     */
    public function __construct(PaymentLabel $PaymentLabel)
    {
        $this->model = $PaymentLabel;
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
                    $query->where('name', 'like', "%{$keyword}%")
                          ->orWhere('description', 'like', "%{$keyword}%");
                })
                ->orderBy($sortColumn, $sort)
                ->paginate($number);
    }
}