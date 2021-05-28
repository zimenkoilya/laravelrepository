<?php

namespace App\Transformers;

use App\Models\CaseAdditional;
use League\Fractal\TransformerAbstract;

class CaseAdditionalTransformer extends TransformerAbstract
{
    public function transform(CaseAdditional $CaseAdditional)
    {
        return [
            'id' => $CaseAdditional->id,
            'name' => $CaseAdditional->name,
            'description' => $CaseAdditional->description,
            'permissions' => $CaseAdditional->permissions,
            'is_default' => $CaseAdditional->is_default,
            'created_at' => $CaseAdditional->created_at,
            'updated_at' => $CaseAdditional->updated_at
        ];
    }
}
