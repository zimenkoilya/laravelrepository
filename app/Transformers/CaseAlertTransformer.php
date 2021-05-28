<?php

namespace App\Transformers;

use App\Models\CaseAlert;
use League\Fractal\TransformerAbstract;

class CaseAlertTransformer extends TransformerAbstract
{
    public function transform(CaseAlert $CaseAlert)
    {
        return [
            'id' => $CaseAlert->id,
            'name' => $CaseAlert->name,
            'description' => $CaseAlert->description,
            'permissions' => $CaseAlert->permissions,
            'is_default' => $CaseAlert->is_default,
            'created_at' => $CaseAlert->created_at,
            'updated_at' => $CaseAlert->updated_at
        ];
    }
}
