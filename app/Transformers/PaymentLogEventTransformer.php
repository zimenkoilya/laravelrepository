<?php

namespace App\Transformers;

use App\Models\PaymentLogEvent;
use League\Fractal\TransformerAbstract;

class PaymentLogEventTransformer extends TransformerAbstract
{
    public function transform(PaymentLogEvent $PaymentLogEvent)
    {
        return [
            'id' => $PaymentLogEvent->id,
            'name' => $PaymentLogEvent->name,
            'description' => $PaymentLogEvent->description,
            'permissions' => $PaymentLogEvent->permissions,
            'is_default' => $PaymentLogEvent->is_default,
            'created_at' => $PaymentLogEvent->created_at,
            'updated_at' => $PaymentLogEvent->updated_at
        ];
    }
}
