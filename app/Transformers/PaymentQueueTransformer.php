<?php

namespace App\Transformers;

use App\Models\PaymentQueue;
use League\Fractal\TransformerAbstract;

class PaymentQueueTransformer extends TransformerAbstract
{
    public function transform(PaymentQueue $PaymentQueue)
    {
        return [
            'id' => $PaymentQueue->id,
            'name' => $PaymentQueue->name,
            'description' => $PaymentQueue->description,
            'permissions' => $PaymentQueue->permissions,
            'is_default' => $PaymentQueue->is_default,
            'created_at' => $PaymentQueue->created_at,
            'updated_at' => $PaymentQueue->updated_at
        ];
    }
}
