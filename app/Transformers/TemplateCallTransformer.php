<?php

namespace App\Transformers;

use App\Models\TemplateCall;
use League\Fractal\TransformerAbstract;

class TemplateCallTransformer extends TransformerAbstract
{
    public function transform(TemplateCall $TemplateCall)
    {
        return [
            'id' => $TemplateCall->id,
            'name' => $TemplateCall->name,
            'data_template' => $TemplateCall->data_template,
            'type' => $TemplateCall->type,
            'url' => $TemplateCall->url,
            'active' => $TemplateCall->active,
            'created_at' => $TemplateCall->created_at,
            'updated_at' => $TemplateCall->updated_at,
        ];
    }
}
