<?php

namespace App\Transformers;

use App\Models\CaseCall;
use League\Fractal\TransformerAbstract;

class CaseCallTransformer extends TransformerAbstract
{
    public function transform(CaseCall $CaseCall)
    {
        return [
            'id' => $CaseCall->id,
            'name' => $CaseCall->name,
            'description' => $CaseCall->description,
            'permissions' => $CaseCall->permissions,
            'is_default' => $CaseCall->is_default,
            'created_at' => $CaseCall->created_at,
            'updated_at' => $CaseCall->updated_at
        ];
    }
}
