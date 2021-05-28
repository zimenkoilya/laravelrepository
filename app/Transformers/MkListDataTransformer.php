<?php

namespace App\Transformers;

use App\Models\MkList;
use League\Fractal\TransformerAbstract;

class MkListTransformer extends TransformerAbstract
{
    public function transform(MkList $MkList)
    {
        return [
            'id' => $MkList->id,
            'name' => $MkList->name,
            'description' => $MkList->description,
            'permissions' => $MkList->permissions,
            'is_default' => $MkList->is_default,
            'created_at' => $MkList->created_at,
            'updated_at' => $MkList->updated_at
        ];
    }
}
