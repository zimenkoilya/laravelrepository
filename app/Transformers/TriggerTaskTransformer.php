<?php

namespace App\Transformers;

use App\Models\TriggerTask;
use League\Fractal\TransformerAbstract;

class TriggerTaskTransformer extends TransformerAbstract
{
    public function transform(TriggerTask $TriggerTask)
    {
        return [
            'id' => $TriggerTask->id,
            'name' => $TriggerTask->name,
            'role' => $TriggerTask->role,
        ];
    }
}
