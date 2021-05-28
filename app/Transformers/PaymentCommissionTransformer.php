<?php

namespace App\Transformers;

use App\Models\PaymentCommission;
use League\Fractal\TransformerAbstract;

class PaymentCommissionTransformer extends TransformerAbstract
{
    public function transform(PaymentCommission $PaymentCommission)
    {
        return [
            'id' => $PaymentCommission->id,
            'name' => $PaymentCommission->name,
            'description' => $PaymentCommission->description,
            'permissions' => $PaymentCommission->permissions,
            'is_default' => $PaymentCommission->is_default,
            'created_at' => $PaymentCommission->created_at,
            'updated_at' => $PaymentCommission->updated_at
        ];
    }
}
