<?php

namespace App\Transformers;

use App\Models\Trigger;
use League\Fractal\TransformerAbstract;

class TriggerTransformer extends TransformerAbstract
{
    public function transform(Trigger $trigger)
    {
        return [
            'id' => $trigger->id,
            'trigger_type' => $trigger->trigger_type,
            'action' => $trigger->action
        ];
    }
}
