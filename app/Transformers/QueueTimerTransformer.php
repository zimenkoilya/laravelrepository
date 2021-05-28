<?php

namespace App\Transformers;

use App\Models\QueueTimer;
use League\Fractal\TransformerAbstract;

class QueueTimerTransformer extends TransformerAbstract
{
    public function transform(QueueTimer $QueueTimer)
    {
        return [
            'id' => $QueueTimer->id,
            'name' => $QueueTimer->name,
            'description' => $QueueTimer->description,
            'permissions' => $QueueTimer->permissions,
            'is_default' => $QueueTimer->is_default,
            'created_at' => $QueueTimer->created_at,
            'updated_at' => $QueueTimer->updated_at
        ];
    }
}
