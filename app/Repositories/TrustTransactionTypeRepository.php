<?php

namespace App\Repositories;

use App\Models\TrustTransactionType;

class TrustTransactionTypeRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var TrustTransactionType
     */
    protected $model;

    /**
     * Constructor
     *
     * @param TrustTransactionType $TrustTransactionType
     */
    public function __construct(TrustTransactionType $TrustTransactionType)
    {
        $this->model = $TrustTransactionType;
    }

    public function getByName($name){
        return $this->model->where('name', $name)->first();
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
        return $this->model
        ->orderBy($sortColumn, $sort)
        ->paginate($number);
    }
}