<?php

namespace App\Repositories;

use App\Models\SupportTicketChat;

class SupportTicketChatRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var SupportTicketChat
     */
    protected $model;

    /**
     * Constructor
     *
     * @param SupportTicketChat $SupportTicketChat
     */
    public function __construct(SupportTicketChat $SupportTicketChat)
    {
        $this->model = $SupportTicketChat;
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
            $query->where('chat_message', 'like', "%{$keyword}%");
        })
        ->orderBy($sortColumn, $sort)
        ->paginate($number);
    }
}