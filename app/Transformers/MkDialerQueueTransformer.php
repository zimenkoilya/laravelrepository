<?php

namespace App\Transformers;

use App\Models\MkDialerQueue;
use League\Fractal\TransformerAbstract;

class MkDialerQueueTransformer extends TransformerAbstract
{
    public function transform(MkDialerQueue $MkDialerQueue)
    {
        return [
            'id' => $MkDialerQueue->id,
            'name' => $MkDialerQueue->name,
            'description' => $MkDialerQueue->description,
            'permissions' => $MkDialerQueue->permissions,
            'is_default' => $MkDialerQueue->is_default,
            'created_at' => $MkDialerQueue->created_at,
            'updated_at' => $MkDialerQueue->updated_at
        ];
    }
}
