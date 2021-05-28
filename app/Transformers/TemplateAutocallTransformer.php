<?php

namespace App\Transformers;

use App\Models\TemplateAutocall;
use League\Fractal\TransformerAbstract;

class TemplateAutocallTransformer extends TransformerAbstract
{
    public function transform(TemplateAutocall $TemplateAutocall)
    {
        return [
            'id' => $TemplateAutocall->id,
            'name' => $TemplateAutocall->name,
            'data_template' => $TemplateAutocall->data_template,
            'type' => $TemplateAutocall->type,
            'url' => $TemplateAutocall->url,
            'active' => $TemplateAutocall->active,
            'created_at' => $TemplateAutocall->created_at,
            'updated_at' => $TemplateAutocall->updated_at,
        ];
    }
}
