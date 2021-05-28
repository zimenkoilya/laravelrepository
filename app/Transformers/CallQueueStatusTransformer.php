<?php

namespace App\Transformers;

use App\Models\CallQueueStatus;
use League\Fractal\TransformerAbstract;

class CallQueueStatusTransformer extends TransformerAbstract
{
    public function transform(CallQueueStatus $CallQueueStatus)
    {
        return [
            'id' => $CallQueueStatus->id,
            'name' => $CallQueueStatus->name,
            'description' => $CallQueueStatus->description,
            'permissions' => $CallQueueStatus->permissions,
            'is_default' => $CallQueueStatus->is_default,
            'created_at' => $CallQueueStatus->created_at,
            'updated_at' => $CallQueueStatus->updated_at
        ];
    }
}
