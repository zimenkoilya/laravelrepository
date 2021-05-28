<?php

namespace App\Transformers;

use App\Models\TaskEvent;
use League\Fractal\TransformerAbstract;

class TaskEventTransformer extends TransformerAbstract
{
    public function transform(TaskEvent $TaskEvent)
    {
        return [
            'id' => $TaskEvent->id,
            'name' => $TaskEvent->name,
            'data_template' => $TaskEvent->data_template,
            'type' => $TaskEvent->type,
            'url' => $TaskEvent->url,
            'active' => $TaskEvent->active,
            'created_at' => $TaskEvent->created_at,
            'updated_at' => $TaskEvent->updated_at,
        ];
    }
}
