<?php

namespace App\Repositories;

use App\Models\TemplateExportRule;

class TemplateExportRuleRepository
{
    use BaseRepository;

    /**
     * Accounting Model
     *
     * @var TemplateExportRule
     */
    protected $model;

    /**
     * Constructor
     *
     * @param TemplateExportRule $TemplateExportRule
     */
    public function __construct(TemplateExportRule $TemplateExportRule)
    {
        $this->model = $TemplateExportRule;
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
        return $this->model
        ->orderBy($sortColumn, $sort)
        ->paginate($number);
    }
}