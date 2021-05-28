<?php

namespace App\Repositories;

use App\Models\TrustProgram;

class TrustProgramRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var TrustProgram
     */
    protected $model;

    /**
     * Constructor
     *
     * @param TrustProgram $TrustProgram
     */
    public function __construct(TrustProgram $TrustProgram)
    {
        $this->model = $TrustProgram;
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