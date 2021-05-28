<?php

namespace App\Transformers;

use App\Models\TaskEventTrigger;
use League\Fractal\TransformerAbstract;

class TaskEventTriggerTransformer extends TransformerAbstract
{
    public function transform(TaskEventTrigger $TaskEventTrigger)
    {
        return [
            'id' => $TaskEventTrigger->id,
            'name' => $TaskEventTrigger->name,
            'data_template' => $TaskEventTrigger->data_template,
            'type' => $TaskEventTrigger->type,
            'url' => $TaskEventTrigger->url,
            'active' => $TaskEventTrigger->active,
            'created_at' => $TaskEventTrigger->created_at,
            'updated_at' => $TaskEventTrigger->updated_at,
        ];
    }
}
