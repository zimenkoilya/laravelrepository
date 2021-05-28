<?php

namespace App\Transformers;

use App\Models\TemplateSms;
use League\Fractal\TransformerAbstract;

class TemplateSmsTransformer extends TransformerAbstract
{
    public function transform(TemplateSms $TemplateSms)
    {
        return [
            'id' => $TemplateSms->id,
            'name' => $TemplateSms->name,
            'data_template' => $TemplateSms->data_template,
            'type' => $TemplateSms->type,
            'url' => $TemplateSms->url,
            'active' => $TemplateSms->active,
            'created_at' => $TemplateSms->created_at,
            'updated_at' => $TemplateSms->updated_at,
        ];
    }
}
