<?php

namespace App\Repositories;

use App\Models\TrustRamDoc;

class TrustRamDocRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var TrustRamDoc
     */
    protected $model;

    /**
     * Constructor
     *
     * @param TrustRamDoc $TrustRamDoc
     */
    public function __construct(TrustRamDoc $TrustRamDoc)
    {
        $this->model = $TrustRamDoc;
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
    public function pageWithRequest($request, $number = 10, $sort = 'asc', $sortColumn = 'created')
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