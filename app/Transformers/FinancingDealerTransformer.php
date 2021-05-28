<?php

namespace App\Transformers;

use App\Models\FinancingDealer;
use League\Fractal\TransformerAbstract;

class FinancingDealerTransformer extends TransformerAbstract
{
    public function transform(FinancingDealer $FinancingDealer)
    {
        return [
            'id' => $FinancingDealer->id,
            'name' => $FinancingDealer->name,
            'description' => $FinancingDealer->description,
            'permissions' => $FinancingDealer->permissions,
            'is_default' => $FinancingDealer->is_default,
            'created_at' => $FinancingDealer->created_at,
            'updated_at' => $FinancingDealer->updated_at
        ];
    }
}
