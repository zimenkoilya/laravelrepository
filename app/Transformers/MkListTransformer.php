<?php

namespace App\Transformers;

use App\Models\MkListData;
use League\Fractal\TransformerAbstract;

class MkListDataTransformer extends TransformerAbstract
{
    public function transform(MkListData $MkListData)
    {
        return [
            'id' => $MkListData->id,
            'name' => $MkListData->name,
            'description' => $MkListData->description,
            'permissions' => $MkListData->permissions,
            'is_default' => $MkListData->is_default,
            'created_at' => $MkListData->created_at,
            'updated_at' => $MkListData->updated_at
        ];
    }
}
