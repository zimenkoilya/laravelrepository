<?php

namespace App\Transformers;

use App\Models\CreditreportLog;
use League\Fractal\TransformerAbstract;

class CreditreportLogTransformer extends TransformerAbstract
{
    public function transform(CreditreportLog $CreditreportLog)
    {
        return [
            'id' => $CreditreportLog->id,
            'name' => $CreditreportLog->name,
            'description' => $CreditreportLog->description,
            'permissions' => $CreditreportLog->permissions,
            'is_default' => $CreditreportLog->is_default,
            'created_at' => $CreditreportLog->created_at,
            'updated_at' => $CreditreportLog->updated_at
        ];
    }
}
