<?php

namespace App\Transformers;

use App\Models\CreditreportSummary;
use League\Fractal\TransformerAbstract;

class CreditreportSummaryTransformer extends TransformerAbstract
{
    public function transform(CreditreportSummary $CreditreportSummary)
    {
        return [
            'id' => $CreditreportSummary->id,
            'name' => $CreditreportSummary->name,
            'description' => $CreditreportSummary->description,
            'permissions' => $CreditreportSummary->permissions,
            'is_default' => $CreditreportSummary->is_default,
            'created_at' => $CreditreportSummary->created_at,
            'updated_at' => $CreditreportSummary->updated_at
        ];
    }
}
