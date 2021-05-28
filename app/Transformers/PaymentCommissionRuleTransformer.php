<?php

namespace App\Transformers;

use App\Models\PaymentCommissionRule;
use League\Fractal\TransformerAbstract;

class PaymentCommissionRuleTransformer extends TransformerAbstract
{
    public function transform(PaymentCommissionRule $PaymentCommissionRule)
    {
        return [
            'id' => $PaymentCommissionRule->id,
            'name' => $PaymentCommissionRule->name,
            'description' => $PaymentCommissionRule->description,
            'permissions' => $PaymentCommissionRule->permissions,
            'is_default' => $PaymentCommissionRule->is_default,
            'created_at' => $PaymentCommissionRule->created_at,
            'updated_at' => $PaymentCommissionRule->updated_at
        ];
    }
}
