<?php

namespace App\Transformers;

use App\Models\MkRvmQueue;
use League\Fractal\TransformerAbstract;

class MkRvmQueueTransformer extends TransformerAbstract
{
    public function transform(MkRvmQueue $MkRvmQueue)
    {
        return [
            'id' => $MkRvmQueue->id,
            'name' => $MkRvmQueue->name,
            'description' => $MkRvmQueue->description,
            'permissions' => $MkRvmQueue->permissions,
            'is_default' => $MkRvmQueue->is_default,
            'created_at' => $MkRvmQueue->created_at,
            'updated_at' => $MkRvmQueue->updated_at
        ];
    }
}
