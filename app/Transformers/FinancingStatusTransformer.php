<?php

namespace App\Transformers;

use App\Models\FinancingStatus;
use League\Fractal\TransformerAbstract;

class FinancingStatusTransformer extends TransformerAbstract
{
    public function transform(FinancingStatus $FinancingStatus)
    {
        return [
            'id' => $FinancingStatus->id,
            'name' => $FinancingStatus->name,
            'description' => $FinancingStatus->description,
            'permissions' => $FinancingStatus->permissions,
            'is_default' => $FinancingStatus->is_default,
            'created_at' => $FinancingStatus->created_at,
            'updated_at' => $FinancingStatus->updated_at
        ];
    }
}
