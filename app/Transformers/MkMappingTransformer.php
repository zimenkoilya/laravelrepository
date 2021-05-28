<?php

namespace App\Transformers;

use App\Models\MkMapping;
use League\Fractal\TransformerAbstract;

class MkMappingTransformer extends TransformerAbstract
{
    public function transform(MkMapping $MkMapping)
    {
        return [
            'id' => $MkMapping->id,
            'name' => $MkMapping->name,
            'description' => $MkMapping->description,
            'permissions' => $MkMapping->permissions,
            'is_default' => $MkMapping->is_default,
            'created_at' => $MkMapping->created_at,
            'updated_at' => $MkMapping->updated_at
        ];
    }
}
