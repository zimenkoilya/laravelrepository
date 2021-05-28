<?php

namespace App\Transformers;

use App\Models\Task;
use League\Fractal\TransformerAbstract;

class TaskTransformer extends TransformerAbstract
{
    public function transform(Task $Task)
    {
        return [
            'id' => $Task->id,
            'name' => $Task->name,
            'data_template' => $Task->data_template,
            'type' => $Task->type,
            'url' => $Task->url,
            'active' => $Task->active,
            'created_at' => $Task->created_at,
            'updated_at' => $Task->updated_at,
        ];
    }
}
