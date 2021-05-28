<?php

namespace App\Transformers;

use App\Models\CallType;
use League\Fractal\TransformerAbstract;

class CallTypeTransformer extends TransformerAbstract
{
    public function transform(CallType $CallType)
    {
        return [
            'id' => $CallType->id,
            'name' => $CallType->name,
            'description' => $CallType->description,
            'permissions' => $CallType->permissions,
            'is_default' => $CallType->is_default,
            'created_at' => $CallType->created_at,
            'updated_at' => $CallType->updated_at
        ];
    }
}
