<?php

namespace App\Transformers;

use App\Models\CaseTransaction;
use League\Fractal\TransformerAbstract;

class CaseTransactionTransformer extends TransformerAbstract
{
    public function transform(CaseTransaction $CaseTransaction)
    {
        return [
            'id' => $CaseTransaction->id,
            'name' => $CaseTransaction->name,
            'description' => $CaseTransaction->description,
            'permissions' => $CaseTransaction->permissions,
            'is_default' => $CaseTransaction->is_default,
            'created_at' => $CaseTransaction->created_at,
            'updated_at' => $CaseTransaction->updated_at
        ];
    }
}
