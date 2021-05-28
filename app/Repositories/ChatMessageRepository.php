<?php

namespace App\Repositories;

use App\Models\ChatMessage;

class ChatMessageRepository
{
    use BaseRepository;

    /**
     * ChatMessage Model
     *
     * @var ChatMessage
     */
    protected $model;

    /**
     * Constructor
     *
     * @param ChatMessage $ChatMessage
     */
    public function __construct(ChatMessage $ChatMessage)
    {
        $this->model = $ChatMessage;
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
    public function pageWithRequest($request, $number = 10, $sort = 'desc', $sortColumn = 'created_at')
    {
        $keyword = $request->get('keyword');

        if ($request->has('limit')) {
            $number = $request->get('limit');
        }

        return $this->model->when($keyword, function ($query) use ($keyword) {
                    $query->where('name', 'like', "%{$keyword}%")
                          ->orWhere('description', 'like', "%{$keyword}%");
                })
                ->orderBy($sortColumn, $sort)
                ->paginate($number);
    }
}