<?php

namespace App\Repositories;

use App\Models\StatusExpiration;

class StatusExpirationRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var StatusExpiration
     */
    protected $model;

    /**
     * Constructor
     *
     * @param StatusExpiration $StatusExpiration
     */
    public function __construct(StatusExpiration $StatusExpiration)
    {
        $this->model = $StatusExpiration;
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
    public function pageWithRequest($request, $number = 10, $sort = 'asc', $sortColumn = 'id')
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