<?php

namespace App\Transformers;

use App\Models\MkEmailQueue;
use League\Fractal\TransformerAbstract;

class MkEmailQueueTransformer extends TransformerAbstract
{
    public function transform(MkEmailQueue $MkEmailQueue)
    {
        return [
            'id' => $MkEmailQueue->id,
            'name' => $MkEmailQueue->name,
            'description' => $MkEmailQueue->description,
            'permissions' => $MkEmailQueue->permissions,
            'is_default' => $MkEmailQueue->is_default,
            'created_at' => $MkEmailQueue->created_at,
            'updated_at' => $MkEmailQueue->updated_at
        ];
    }
}
