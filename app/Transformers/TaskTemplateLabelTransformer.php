<?php

namespace App\Transformers;

use App\Models\TaskTemplateLabel;
use League\Fractal\TransformerAbstract;

class TaskTemplateLabelTransformer extends TransformerAbstract
{
    public function transform(TaskTemplateLabel $TaskTemplateLabel)
    {
        return [
            'id' => $TaskTemplateLabel->id,
            'name' => $TaskTemplateLabel->name,
            'data_template' => $TaskTemplateLabel->data_template,
            'type' => $TaskTemplateLabel->type,
            'url' => $TaskTemplateLabel->url,
            'active' => $TaskTemplateLabel->active,
            'created_at' => $TaskTemplateLabel->created_at,
            'updated_at' => $TaskTemplateLabel->updated_at,
        ];
    }
}
