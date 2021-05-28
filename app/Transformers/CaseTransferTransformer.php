<?php

namespace App\Transformers;

use App\Models\CaseTransfer;
use League\Fractal\TransformerAbstract;

class CaseTransferTransformer extends TransformerAbstract
{
    public function transform(CaseTransfer $CaseTransfer)
    {
        return [
            'id' => $CaseTransfer->id,
            'name' => $CaseTransfer->name,
            'description' => $CaseTransfer->description,
            'permissions' => $CaseTransfer->permissions,
            'is_default' => $CaseTransfer->is_default,
            'created_at' => $CaseTransfer->created_at,
            'updated_at' => $CaseTransfer->updated_at
        ];
    }
}
