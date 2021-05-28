<?php

namespace App\Transformers;

use App\Models\CaseStatus;
use League\Fractal\TransformerAbstract;

class CaseStatusTransformer extends TransformerAbstract
{
    public function transform(CaseStatus $CaseStatus)
    {
        return [
            'id' => $CaseStatus->id,
            'name' => $CaseStatus->name,
            'description' => $CaseStatus->description,
            'permissions' => $CaseStatus->permissions,
            'is_default' => $CaseStatus->is_default,
            'created_at' => $CaseStatus->created_at,
            'updated_at' => $CaseStatus->updated_at
        ];
    }
}
