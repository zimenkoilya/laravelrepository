<?php

namespace App\Transformers;

use App\Models\TriggerEvent;
use League\Fractal\TransformerAbstract;

class TriggerEventTransformer extends TransformerAbstract
{
    public function transform(TriggerEvent $TriggerEvent)
    {
        return [
            'id' => $TriggerEvent->id,
            'name' => $TriggerEvent->name,
            'role' => $TriggerEvent->role,
        ];
    }
}
