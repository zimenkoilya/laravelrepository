<?php

namespace App\Repositories;

use App\Models\SupportTicketActivity;

class SupportTicketActivityRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var SupportTicketActivity
     */
    protected $model;

    /**
     * Constructor
     *
     * @param SupportTicketActivity $SupportTicketActivity
     */
    public function __construct(SupportTicketActivity $SupportTicketActivity)
    {
        $this->model = $SupportTicketActivity;
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