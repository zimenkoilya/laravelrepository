<?php

namespace App\Transformers;

use App\Models\PaymentStatus;
use League\Fractal\TransformerAbstract;

class PaymentStatusTransformer extends TransformerAbstract
{
    public function transform(PaymentStatus $PaymentStatus)
    {
        return [
            'id' => $PaymentStatus->id,
            'name' => $PaymentStatus->name,
            'description' => $PaymentStatus->description,
            'permissions' => $PaymentStatus->permissions,
            'is_default' => $PaymentStatus->is_default,
            'created_at' => $PaymentStatus->created_at,
            'updated_at' => $PaymentStatus->updated_at
        ];
    }
}
