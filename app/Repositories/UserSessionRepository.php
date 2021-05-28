<?php

namespace App\Repositories;

use App\Models\UserSession;

class UserSessionRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var UserSession
     */
    protected $model;

    /**
     * Constructor
     *
     * @param UserSession $UserSession
     */
    public function __construct(UserSession $UserSession)
    {
        $this->model = $UserSession;
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
    public function pageWithRequest($request, $number = 10, $sort = 'asc', $sortColumn = 'timestamp')
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