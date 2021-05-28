<?php

namespace App\Transformers;

use App\Models\MkQueueStatus;
use League\Fractal\TransformerAbstract;

class MkQueueStatusTransformer extends TransformerAbstract
{
    public function transform(MkQueueStatus $MkQueueStatus)
    {
        return [
            'id' => $MkQueueStatus->id,
            'name' => $MkQueueStatus->name,
            'description' => $MkQueueStatus->description,
            'permissions' => $MkQueueStatus->permissions,
            'is_default' => $MkQueueStatus->is_default,
            'created_at' => $MkQueueStatus->created_at,
            'updated_at' => $MkQueueStatus->updated_at
        ];
    }
}
