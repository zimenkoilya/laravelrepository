<?php

namespace App\Repositories;

use App\Models\SupportTicketNote;

class SupportTicketNoteRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var SupportTicketNote
     */
    protected $model;

    /**
     * Constructor
     *
     * @param SupportTicketNote $SupportTicketNote
     */
    public function __construct(SupportTicketNote $SupportTicketNote)
    {
        $this->model = $SupportTicketNote;
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
            $query->where('note', 'like', "%{$keyword}%");
        })
        ->orderBy($sortColumn, $sort)
        ->paginate($number);
    }
}