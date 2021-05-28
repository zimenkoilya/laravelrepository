<?php

namespace App\Repositories;

use App\Models\SupportTicket;

class SupportTicketRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var SupportTicket
     */
    protected $model;

    /**
     * Constructor
     *
     * @param SupportTicket $SupportTicket
     */
    public function __construct(SupportTicket $SupportTicket)
    {
        $this->model = $SupportTicket;
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
        return $this->model->when($keyword, function ($query) use ($keyword) {
            $query->where('comment', 'like', "%{$keyword}%");
        })
        ->orderBy($sortColumn, $sort)
        ->paginate($number);
    }
}