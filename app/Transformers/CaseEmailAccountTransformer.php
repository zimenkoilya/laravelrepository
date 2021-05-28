<?php

namespace App\Transformers;

use App\Models\CaseEmailAccount;
use League\Fractal\TransformerAbstract;

class CaseEmailAccountTransformer extends TransformerAbstract
{
    public function transform(CaseEmailAccount $CaseEmailAccount)
    {
        return [
            'id' => $CaseEmailAccount->id,
            'name' => $CaseEmailAccount->name,
            'description' => $CaseEmailAccount->description,
            'permissions' => $CaseEmailAccount->permissions,
            'is_default' => $CaseEmailAccount->is_default,
            'created_at' => $CaseEmailAccount->created_at,
            'updated_at' => $CaseEmailAccount->updated_at
        ];
    }
}
