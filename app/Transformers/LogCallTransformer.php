<?php

namespace App\Transformers;

use App\Models\LogCall;
use League\Fractal\TransformerAbstract;

class LogCallTransformer extends TransformerAbstract
{
    public function transform(LogCall $LogCall)
    {
        return [
            'id' => $LogCall->id,
            'name' => $LogCall->name,
            'description' => $LogCall->description,
            'permissions' => $LogCall->permissions,
            'is_default' => $LogCall->is_default,
            'created_at' => $LogCall->created_at,
            'updated_at' => $LogCall->updated_at
        ];
    }
}
