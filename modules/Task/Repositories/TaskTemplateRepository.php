<?php

namespace Modules\Task\Repositories;

use App\Repositories\BaseRepository;
use Modules\Task\Models\TaskTemplate;

class TaskTemplateRepository
{
    use BaseRepository;

    /**
     * TaskTemplate Model
     *
     * @var TaskTemplate
     */
    protected $model;

    /**
     * Constructor
     *
     * @param TaskTemplate $template
     */
    public function __construct(TaskTemplate $template)
    {
        $this->model = $template;
    }

    public function list()
    {
        $company_id = auth()->user()->company_id;

        return $this->model
                    ->where('company_id', $company_id)
                    ->where('type', 'task')
                    ->get();
    }
}