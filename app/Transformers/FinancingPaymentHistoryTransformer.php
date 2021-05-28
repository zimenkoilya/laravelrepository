<?php

namespace App\Transformers;

use App\Models\FinancingPaymentHistory;
use League\Fractal\TransformerAbstract;

class FinancingPaymentHistoryTransformer extends TransformerAbstract
{
    public function transform(FinancingPaymentHistory $FinancingPaymentHistory)
    {
        return [
            'id' => $FinancingPaymentHistory->id,
            'name' => $FinancingPaymentHistory->name,
            'description' => $FinancingPaymentHistory->description,
            'permissions' => $FinancingPaymentHistory->permissions,
            'is_default' => $FinancingPaymentHistory->is_default,
            'created_at' => $FinancingPaymentHistory->created_at,
            'updated_at' => $FinancingPaymentHistory->updated_at
        ];
    }
}
