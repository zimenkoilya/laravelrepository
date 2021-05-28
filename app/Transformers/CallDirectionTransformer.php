<?php

namespace App\Transformers;

use App\Models\CallDirection;
use League\Fractal\TransformerAbstract;

class CallDirectionTransformer extends TransformerAbstract
{
    public function transform(CallDirection $CallDirection)
    {
        return [
            'id' => $CallDirection->id,
            'name' => $CallDirection->name,
            'description' => $CallDirection->description,
            'permissions' => $CallDirection->permissions,
            'is_default' => $CallDirection->is_default,
            'created_at' => $CallDirection->created_at,
            'updated_at' => $CallDirection->updated_at
        ];
    }
}
