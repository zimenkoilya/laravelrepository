<?php

namespace App\Transformers;

use App\Models\FinancingChargeback;
use League\Fractal\TransformerAbstract;

class FinancingChargebackTransformer extends TransformerAbstract
{
    public function transform(FinancingChargeback $FinancingChargeback)
    {
        return [
            'id' => $FinancingChargeback->id,
            'name' => $FinancingChargeback->name,
            'description' => $FinancingChargeback->description,
            'permissions' => $FinancingChargeback->permissions,
            'is_default' => $FinancingChargeback->is_default,
            'created_at' => $FinancingChargeback->created_at,
            'updated_at' => $FinancingChargeback->updated_at
        ];
    }
}
