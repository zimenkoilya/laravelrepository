<?php

namespace App\Transformers;

use App\Models\TriggerType;
use League\Fractal\TransformerAbstract;

class TriggerTypeTransformer extends TransformerAbstract
{
    public function transform(TriggerType $triggerType)
    {
        return [
            'id' => $triggerType->id,
            'name' => $triggerType->name,
            'description' => $triggerType->description,
            'category' => $triggerType->category,
            'event' => $triggerType->event,
        ];
    }
}
