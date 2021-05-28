<?php

namespace App\Transformers;

use App\Models\FinancingFirstpay;
use League\Fractal\TransformerAbstract;

class FinancingFirstpayTransformer extends TransformerAbstract
{
    public function transform(FinancingFirstpay $FinancingFirstpay)
    {
        return [
            'id' => $FinancingFirstpay->id,
            'name' => $FinancingFirstpay->name,
            'description' => $FinancingFirstpay->description,
            'permissions' => $FinancingFirstpay->permissions,
            'is_default' => $FinancingFirstpay->is_default,
            'created_at' => $FinancingFirstpay->created_at,
            'updated_at' => $FinancingFirstpay->updated_at
        ];
    }
}
