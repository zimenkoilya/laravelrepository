<?php

namespace App\Transformers;

use App\Models\MkEmailTemplate;
use League\Fractal\TransformerAbstract;

class MkEmailTemplateTransformer extends TransformerAbstract
{
    public function transform(MkEmailTemplate $MkEmailTemplate)
    {
        return [
            'id' => $MkEmailTemplate->id,
            'name' => $MkEmailTemplate->name,
            'description' => $MkEmailTemplate->description,
            'permissions' => $MkEmailTemplate->permissions,
            'is_default' => $MkEmailTemplate->is_default,
            'created_at' => $MkEmailTemplate->created_at,
            'updated_at' => $MkEmailTemplate->updated_at
        ];
    }
}
