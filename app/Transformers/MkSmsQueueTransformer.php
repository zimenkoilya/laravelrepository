<?php

namespace App\Transformers;

use App\Models\MkSmsQueue;
use League\Fractal\TransformerAbstract;

class MkSmsQueueTransformer extends TransformerAbstract
{
    public function transform(MkSmsQueue $MkSmsQueue)
    {
        return [
            'id' => $MkSmsQueue->id,
            'name' => $MkSmsQueue->name,
            'description' => $MkSmsQueue->description,
            'permissions' => $MkSmsQueue->permissions,
            'is_default' => $MkSmsQueue->is_default,
            'created_at' => $MkSmsQueue->created_at,
            'updated_at' => $MkSmsQueue->updated_at
        ];
    }
}
