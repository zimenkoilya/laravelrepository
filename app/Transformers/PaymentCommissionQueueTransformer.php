<?php

namespace App\Transformers;

use App\Models\PaymentCommissionQueue;
use League\Fractal\TransformerAbstract;

class PaymentCommissionQueueTransformer extends TransformerAbstract
{
    public function transform(PaymentCommissionQueue $PaymentCommissionQueue)
    {
        return [
            'id' => $PaymentCommissionQueue->id,
            'name' => $PaymentCommissionQueue->name,
            'description' => $PaymentCommissionQueue->description,
            'permissions' => $PaymentCommissionQueue->permissions,
            'is_default' => $PaymentCommissionQueue->is_default,
            'created_at' => $PaymentCommissionQueue->created_at,
            'updated_at' => $PaymentCommissionQueue->updated_at
        ];
    }
}
