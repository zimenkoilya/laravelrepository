<?php

namespace App\Transformers;

use App\Models\MkErrorCode;
use League\Fractal\TransformerAbstract;

class MkErrorCodeTransformer extends TransformerAbstract
{
    public function transform(MkErrorCode $MkErrorCode)
    {
        return [
            'id' => $MkErrorCode->id,
            'name' => $MkErrorCode->name,
            'description' => $MkErrorCode->description,
            'permissions' => $MkErrorCode->permissions,
            'is_default' => $MkErrorCode->is_default,
            'created_at' => $MkErrorCode->created_at,
            'updated_at' => $MkErrorCode->updated_at
        ];
    }
}
