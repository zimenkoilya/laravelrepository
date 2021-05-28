<?php

namespace App\Transformers;

use App\Models\CallResult;
use League\Fractal\TransformerAbstract;

class CallResultTransformer extends TransformerAbstract
{
    public function transform(CallResult $CallResult)
    {
        return [
            'id' => $CallResult->id,
            'name' => $CallResult->name,
            'description' => $CallResult->description,
            'permissions' => $CallResult->permissions,
            'is_default' => $CallResult->is_default,
            'created_at' => $CallResult->created_at,
            'updated_at' => $CallResult->updated_at
        ];
    }
}
