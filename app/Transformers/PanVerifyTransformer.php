<?php

namespace App\Transformers;

use App\Models\PanVerify;
use League\Fractal\TransformerAbstract;

class PanVerifyTransformer extends TransformerAbstract
{
    public function transform(PanVerify $PanVerify)
    {
        return [
            'id' => $PanVerify->id,
            'name' => $PanVerify->name,
            'description' => $PanVerify->description,
            'permissions' => $PanVerify->permissions,
            'is_default' => $PanVerify->is_default,
            'created_at' => $PanVerify->created_at,
            'updated_at' => $PanVerify->updated_at
        ];
    }
}
