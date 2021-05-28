<?php

namespace App\Transformers;

use App\Models\PaymentReminderQueue;
use League\Fractal\TransformerAbstract;

class PaymentReminderQueueTransformer extends TransformerAbstract
{
    public function transform(PaymentReminderQueue $PaymentReminderQueue)
    {
        return [
            'id' => $PaymentReminderQueue->id,
            'name' => $PaymentReminderQueue->name,
            'description' => $PaymentReminderQueue->description,
            'permissions' => $PaymentReminderQueue->permissions,
            'is_default' => $PaymentReminderQueue->is_default,
            'created_at' => $PaymentReminderQueue->created_at,
            'updated_at' => $PaymentReminderQueue->updated_at
        ];
    }
}
