<?php

namespace App\Repositories;

use App\Models\TemplateEmail;

class TemplateEmailRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var TemplateEmail
     */
    protected $model;

    /**
     * Constructor
     *
     * @param TemplateEmail $TemplateEmail
     */
    public function __construct(TemplateEmail $TemplateEmail)
    {
        $this->model = $TemplateEmail;
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
            ->orWhere('from', 'like', "%{$keyword}%")
            ->orWhere('subject', 'like', "%{$keyword}%");
        })
        ->orderBy($sortColumn, $sort)
        ->paginate($number);
    }
}