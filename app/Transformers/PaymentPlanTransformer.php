<?php

namespace App\Transformers;

use App\Models\PaymentPlan;
use League\Fractal\TransformerAbstract;

class PaymentPlanTransformer extends TransformerAbstract
{
    public function transform(PaymentPlan $PaymentPlan)
    {
        return [
            'id' => $PaymentPlan->id,
            'name' => $PaymentPlan->name,
            'description' => $PaymentPlan->description,
            'permissions' => $PaymentPlan->permissions,
            'is_default' => $PaymentPlan->is_default,
            'created_at' => $PaymentPlan->created_at,
            'updated_at' => $PaymentPlan->updated_at
        ];
    }
}
