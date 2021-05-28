<?php

namespace App\Transformers;

use App\Models\EventType;
use League\Fractal\TransformerAbstract;

class EventTypeTransformer extends TransformerAbstract
{
    public function transform(EventType $EventType)
    {
        return [
            'id' => $EventType->id,
            'name' => $EventType->name,
            'description' => $EventType->description,
            'permissions' => $EventType->permissions,
            'is_default' => $EventType->is_default,
            'created_at' => $EventType->created_at,
            'updated_at' => $EventType->updated_at
        ];
    }
}
