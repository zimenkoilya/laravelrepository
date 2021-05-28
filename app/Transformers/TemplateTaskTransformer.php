<?php

namespace App\Transformers;

use App\Models\TemplateTask;
use League\Fractal\TransformerAbstract;

class TemplateTaskTransformer extends TransformerAbstract
{
    public function transform(TemplateTask $TemplateTask)
    {
        return [
            'id' => $TemplateTask->id,
            'name' => $TemplateTask->name,
            'data_template' => $TemplateTask->data_template,
            'type' => $TemplateTask->type,
            'url' => $TemplateTask->url,
            'active' => $TemplateTask->active,
            'created_at' => $TemplateTask->created_at,
            'updated_at' => $TemplateTask->updated_at,
        ];
    }
}
