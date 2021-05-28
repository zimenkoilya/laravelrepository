<?php

namespace App\Transformers;

use App\Models\TemplateSignature;
use League\Fractal\TransformerAbstract;

class TemplateSignatureTransformer extends TransformerAbstract
{
    public function transform(TemplateSignature $TemplateSignature)
    {
        return [
            'id' => $TemplateSignature->id,
            'name' => $TemplateSignature->name,
            'data_template' => $TemplateSignature->data_template,
            'type' => $TemplateSignature->type,
            'url' => $TemplateSignature->url,
            'active' => $TemplateSignature->active,
            'created_at' => $TemplateSignature->created_at,
            'updated_at' => $TemplateSignature->updated_at,
        ];
    }
}
