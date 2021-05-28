<?php

namespace App\Transformers;

use App\Models\CreditreportData;
use League\Fractal\TransformerAbstract;

class CreditreportDataTransformer extends TransformerAbstract
{
    public function transform(CreditreportData $CreditreportData)
    {
        return [
            'id' => $CreditreportData->id,
            'name' => $CreditreportData->name,
            'description' => $CreditreportData->description,
            'permissions' => $CreditreportData->permissions,
            'is_default' => $CreditreportData->is_default,
            'created_at' => $CreditreportData->created_at,
            'updated_at' => $CreditreportData->updated_at
        ];
    }
}
