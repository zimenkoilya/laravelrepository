<?php

namespace App\Transformers;

use App\Models\SystemTask;
use League\Fractal\TransformerAbstract;

class SystemTaskTransformer extends TransformerAbstract
{
    public function transform(SystemTask $SystemTask)
    {
        return [
            'id' => $SystemTask->id,
            'name' => $SystemTask->name,
            'data_template' => $SystemTask->data_template,
            'type' => $SystemTask->type,
            'url' => $SystemTask->url,
            'active' => $SystemTask->active,
            'created_at' => $SystemTask->created_at,
            'updated_at' => $SystemTask->updated_at,
        ];
    }
}
