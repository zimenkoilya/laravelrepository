<?php

namespace App\Transformers;

use App\Models\FinancingLog;
use League\Fractal\TransformerAbstract;

class FinancingLogTransformer extends TransformerAbstract
{
    public function transform(FinancingLog $FinancingLog)
    {
        return [
            'id' => $FinancingLog->id,
            'name' => $FinancingLog->name,
            'description' => $FinancingLog->description,
            'permissions' => $FinancingLog->permissions,
            'is_default' => $FinancingLog->is_default,
            'created_at' => $FinancingLog->created_at,
            'updated_at' => $FinancingLog->updated_at
        ];
    }
}
