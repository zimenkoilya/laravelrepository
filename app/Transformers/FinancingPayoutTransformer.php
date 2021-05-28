<?php

namespace App\Transformers;

use App\Models\FinancingPayout;
use League\Fractal\TransformerAbstract;

class FinancingPayoutTransformer extends TransformerAbstract
{
    public function transform(FinancingPayout $FinancingPayout)
    {
        return [
            'id' => $FinancingPayout->id,
            'name' => $FinancingPayout->name,
            'description' => $FinancingPayout->description,
            'permissions' => $FinancingPayout->permissions,
            'is_default' => $FinancingPayout->is_default,
            'created_at' => $FinancingPayout->created_at,
            'updated_at' => $FinancingPayout->updated_at
        ];
    }
}
