<?php

namespace App\Transformers;

use App\Models\TriggerLog;
use League\Fractal\TransformerAbstract;

class TriggerLogTransformer extends TransformerAbstract
{
    public function transform(TriggerLog $TriggerLog)
    {
        return [
            'id' => $TriggerLog->id,
            'name' => $TriggerLog->name,
            'role' => $TriggerLog->role,
        ];
    }
}
