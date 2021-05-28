<?php

namespace App\Repositories;

use App\Models\TrustRelease;

class TrustReleaseRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var TrustRelease
     */
    protected $model;

    /**
     * Constructor
     *
     * @param TrustRelease $TrustRelease
     */
    public function __construct(TrustRelease $TrustRelease)
    {
        $this->model = $TrustRelease;
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