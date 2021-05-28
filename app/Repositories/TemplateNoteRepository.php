<?php

namespace App\Repositories;

use App\Models\TemplateNote;

class TemplateNoteRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var TemplateNote
     */
    protected $model;

    /**
     * Constructor
     *
     * @param TemplateNote $TemplateNote
     */
    public function __construct(TemplateNote $TemplateNote)
    {
        $this->model = $TemplateNote;
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
    public function pageWithRequest($request, $number = 10, $sort = 'asc', $sortColumn = 'name')
    {
        $keyword = $request->get('keyword');

        if ($request->has('limit')) {
            $number = $request->get('limit');
        }
        return $this->model->when($keyword, function ($query) use ($keyword) {
            $query->where('name', 'like', "%{$keyword}%")
            ->orWhere('message', 'like', "%{$keyword}%");
        })
        ->orderBy($sortColumn, $sort)
        ->paginate($number);
    }
}