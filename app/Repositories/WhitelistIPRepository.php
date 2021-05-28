<?php

namespace App\Repositories;

use App\Models\WhitelistIP;

class WhitelistIPRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var WhitelistIP
     */
    protected $model;

    /**
     * Constructor
     *
     * @param WhitelistIP $WhitelistIP
     */
    public function __construct(WhitelistIP $WhitelistIP)
    {
        $this->model = $WhitelistIP;
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
    public function pageWithRequest($request, $number = 10, $sort = 'asc', $sortColumn = 'ip')
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