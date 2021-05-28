<?php

namespace App\Transformers;

use App\Models\CtNumber;
use League\Fractal\TransformerAbstract;

class CtNumberTransformer extends TransformerAbstract
{
    public function transform(CtNumber $CtNumber)
    {
        return [
            'id' => $CtNumber->id,
            'name' => $CtNumber->name,
            'description' => $CtNumber->description,
            'permissions' => $CtNumber->permissions,
            'is_default' => $CtNumber->is_default,
            'created_at' => $CtNumber->created_at,
            'updated_at' => $CtNumber->updated_at
        ];
    }
}
