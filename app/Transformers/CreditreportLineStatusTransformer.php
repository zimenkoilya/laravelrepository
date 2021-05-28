<?php

namespace App\Transformers;

use App\Models\CreditreportLineStatus;
use League\Fractal\TransformerAbstract;

class CreditreportLineStatusTransformer extends TransformerAbstract
{
    public function transform(CreditreportLineStatus $CreditreportLineStatus)
    {
        return [
            'id' => $CreditreportLineStatus->id,
            'name' => $CreditreportLineStatus->name,
            'description' => $CreditreportLineStatus->description,
            'permissions' => $CreditreportLineStatus->permissions,
            'is_default' => $CreditreportLineStatus->is_default,
            'created_at' => $CreditreportLineStatus->created_at,
            'updated_at' => $CreditreportLineStatus->updated_at
        ];
    }
}
