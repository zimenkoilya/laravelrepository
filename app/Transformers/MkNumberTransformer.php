<?php

namespace App\Transformers;

use App\Models\MkNumber;
use League\Fractal\TransformerAbstract;

class MkNumberTransformer extends TransformerAbstract
{
    public function transform(MkNumber $MkNumber)
    {
        return [
            'id' => $MkNumber->id,
            'name' => $MkNumber->name,
            'description' => $MkNumber->description,
            'permissions' => $MkNumber->permissions,
            'is_default' => $MkNumber->is_default,
            'created_at' => $MkNumber->created_at,
            'updated_at' => $MkNumber->updated_at
        ];
    }
}
