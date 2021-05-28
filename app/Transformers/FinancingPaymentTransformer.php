<?php

namespace App\Transformers;

use App\Models\FinancingPayment;
use League\Fractal\TransformerAbstract;

class FinancingPaymentTransformer extends TransformerAbstract
{
    public function transform(FinancingPayment $FinancingPayment)
    {
        return [
            'id' => $FinancingPayment->id,
            'name' => $FinancingPayment->name,
            'description' => $FinancingPayment->description,
            'permissions' => $FinancingPayment->permissions,
            'is_default' => $FinancingPayment->is_default,
            'created_at' => $FinancingPayment->created_at,
            'updated_at' => $FinancingPayment->updated_at
        ];
    }
}
