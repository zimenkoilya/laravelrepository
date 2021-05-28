<?php

namespace App\Transformers;

use App\Models\MkData;
use League\Fractal\TransformerAbstract;

class MkDataTransformer extends TransformerAbstract
{
    public function transform(MkData $MkData)
    {
        return [
            'id' => $MkData->id,
            'name' => $MkData->name,
            'description' => $MkData->description,
            'permissions' => $MkData->permissions,
            'is_default' => $MkData->is_default,
            'created_at' => $MkData->created_at,
            'updated_at' => $MkData->updated_at
        ];
    }
}
