<?php

namespace App\Transformers;

use App\Models\MkRvmTemplate;
use League\Fractal\TransformerAbstract;

class MkRvmTemplateTransformer extends TransformerAbstract
{
    public function transform(MkRvmTemplate $MkRvmTemplate)
    {
        return [
            'id' => $MkRvmTemplate->id,
            'name' => $MkRvmTemplate->name,
            'description' => $MkRvmTemplate->description,
            'permissions' => $MkRvmTemplate->permissions,
            'is_default' => $MkRvmTemplate->is_default,
            'created_at' => $MkRvmTemplate->created_at,
            'updated_at' => $MkRvmTemplate->updated_at
        ];
    }
}
