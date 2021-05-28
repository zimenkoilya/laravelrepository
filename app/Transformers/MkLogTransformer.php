<?php

namespace App\Transformers;

use App\Models\MkLog;
use League\Fractal\TransformerAbstract;

class MkLogTransformer extends TransformerAbstract
{
    public function transform(MkLog $MkLog)
    {
        return [
            'id' => $MkLog->id,
            'name' => $MkLog->name,
            'description' => $MkLog->description,
            'permissions' => $MkLog->permissions,
            'is_default' => $MkLog->is_default,
            'created_at' => $MkLog->created_at,
            'updated_at' => $MkLog->updated_at
        ];
    }
}
