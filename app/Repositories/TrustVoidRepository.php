<?php

namespace App\Repositories;

use App\Models\TrustVoid;

class TrustVoidRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var TrustVoid
     */
    protected $model;

    /**
     * Constructor
     *
     * @param TrustVoid $TrustVoid
     */
    public function __construct(TrustVoid $TrustVoid)
    {
        $this->model = $TrustVoid;
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
    public function pageWithRequest($request, $number = 10, $sort = 'asc', $sortColumn = 'case_id')
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