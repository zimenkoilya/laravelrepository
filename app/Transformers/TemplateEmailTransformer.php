<?php

namespace App\Transformers;

use App\Models\TemplateEmail;
use League\Fractal\TransformerAbstract;

class TemplateEmailTransformer extends TransformerAbstract
{
    public function transform(TemplateEmail $TemplateEmail)
    {
        return [
            'id' => $TemplateEmail->id,
            'name' => $TemplateEmail->name,
            'data_template' => $TemplateEmail->data_template,
            'type' => $TemplateEmail->type,
            'url' => $TemplateEmail->url,
            'active' => $TemplateEmail->active,
            'created_at' => $TemplateEmail->created_at,
            'updated_at' => $TemplateEmail->updated_at,
        ];
    }
}
