<?php

namespace App\Transformers;

use App\Models\MkSmsTemplate;
use League\Fractal\TransformerAbstract;

class MkSmsTemplateTransformer extends TransformerAbstract
{
    public function transform(MkSmsTemplate $MkSmsTemplate)
    {
        return [
            'id' => $MkSmsTemplate->id,
            'name' => $MkSmsTemplate->name,
            'description' => $MkSmsTemplate->description,
            'permissions' => $MkSmsTemplate->permissions,
            'is_default' => $MkSmsTemplate->is_default,
            'created_at' => $MkSmsTemplate->created_at,
            'updated_at' => $MkSmsTemplate->updated_at
        ];
    }
}
