<?php

namespace App\Transformers;

use App\Models\PaymentCommissionCondition;
use League\Fractal\TransformerAbstract;

class PaymentCommissionConditionTransformer extends TransformerAbstract
{
    public function transform(PaymentCommissionCondition $PaymentCommissionCondition)
    {
        return [
            'id' => $PaymentCommissionCondition->id,
            'name' => $PaymentCommissionCondition->name,
            'description' => $PaymentCommissionCondition->description,
            'permissions' => $PaymentCommissionCondition->permissions,
            'is_default' => $PaymentCommissionCondition->is_default,
            'created_at' => $PaymentCommissionCondition->created_at,
            'updated_at' => $PaymentCommissionCondition->updated_at
        ];
    }
}
