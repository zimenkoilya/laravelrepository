<?php

namespace App\Repositories;

use App\Models\Invoice;

class InvoiceRepository
{
    use BaseRepository;

    /**
     * Invoice Model
     *
     * @var Invoice
     */
    protected $model;

    /**
     * Constructor
     *
     * @param Invoice $Invoice
     */
    public function __construct(Invoice $Invoice)
    {
        $this->model = $Invoice;
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