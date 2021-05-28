<?php

namespace App\Transformers;

use App\Models\TemplateFlag;
use League\Fractal\TransformerAbstract;

class TemplateFlagTransformer extends TransformerAbstract
{
    public function transform(TemplateFlag $TemplateFlag)
    {
        return [
            'id' => $TemplateFlag->id,
            'name' => $TemplateFlag->name,
            'data_template' => $TemplateFlag->data_template,
            'type' => $TemplateFlag->type,
            'url' => $TemplateFlag->url,
            'active' => $TemplateFlag->active,
            'created_at' => $TemplateFlag->created_at,
            'updated_at' => $TemplateFlag->updated_at,
        ];
    }
}
