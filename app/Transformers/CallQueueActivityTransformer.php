<?php

namespace App\Transformers;

use App\Models\CallQueueActivity;
use League\Fractal\TransformerAbstract;

class CallQueueActivityTransformer extends TransformerAbstract
{
    public function transform(CallQueueActivity $CallQueueActivity)
    {
        return [
            'id' => $CallQueueActivity->id,
            'name' => $CallQueueActivity->name,
            'description' => $CallQueueActivity->description,
            'permissions' => $CallQueueActivity->permissions,
            'is_default' => $CallQueueActivity->is_default,
            'created_at' => $CallQueueActivity->created_at,
            'updated_at' => $CallQueueActivity->updated_at
        ];
    }
}
