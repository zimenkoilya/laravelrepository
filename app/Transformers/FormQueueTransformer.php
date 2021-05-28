<?php

namespace App\Transformers;

use App\Models\FormQueue;
use League\Fractal\TransformerAbstract;

class FormQueueTransformer extends TransformerAbstract
{
    public function transform(FormQueue $FormQueue)
    {
        return [
            'id' => $FormQueue->id,
            'name' => $FormQueue->name,
            'description' => $FormQueue->description,
            'permissions' => $FormQueue->permissions,
            'is_default' => $FormQueue->is_default,
            'created_at' => $FormQueue->created_at,
            'updated_at' => $FormQueue->updated_at
        ];
    }
}
