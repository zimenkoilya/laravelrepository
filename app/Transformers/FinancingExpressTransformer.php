<?php

namespace App\Transformers;

use App\Models\FinancingExpress;
use League\Fractal\TransformerAbstract;

class FinancingExpressTransformer extends TransformerAbstract
{
    public function transform(FinancingExpress $FinancingExpress)
    {
        return [
            'id' => $FinancingExpress->id,
            'name' => $FinancingExpress->name,
            'description' => $FinancingExpress->description,
            'permissions' => $FinancingExpress->permissions,
            'is_default' => $FinancingExpress->is_default,
            'created_at' => $FinancingExpress->created_at,
            'updated_at' => $FinancingExpress->updated_at
        ];
    }
}
