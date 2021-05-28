<?php

namespace App\Repositories;

use App\Models\SupportTicketAttachment;

class SupportTicketAttachmentRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var SupportTicketAttachment
     */
    protected $model;

    /**
     * Constructor
     *
     * @param SupportTicketAttachment $SupportTicketAttachment
     */
    public function __construct(SupportTicketAttachment $SupportTicketAttachment)
    {
        $this->model = $SupportTicketAttachment;
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
            $query->where('file_name', 'like', "%{$keyword}%")
            ->orWhere('file_location', 'like', "%{$keyword}%");
        })
        ->orderBy($sortColumn, $sort)
        ->paginate($number);
    }
}