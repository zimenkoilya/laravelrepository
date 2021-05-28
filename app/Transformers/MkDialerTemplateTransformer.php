<?php

namespace App\Transformers;

use App\Models\MkDialerTemplate;
use League\Fractal\TransformerAbstract;

class MkDialerTemplateTransformer extends TransformerAbstract
{
    public function transform(MkDialerTemplate $MkDialerTemplate)
    {
        return [
            'id' => $MkDialerTemplate->id,
            'name' => $MkDialerTemplate->name,
            'description' => $MkDialerTemplate->description,
            'permissions' => $MkDialerTemplate->permissions,
            'is_default' => $MkDialerTemplate->is_default,
            'created_at' => $MkDialerTemplate->created_at,
            'updated_at' => $MkDialerTemplate->updated_at
        ];
    }
}
