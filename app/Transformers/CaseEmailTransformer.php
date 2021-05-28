<?php

namespace App\Transformers;

use App\Models\CaseEmail;
use League\Fractal\TransformerAbstract;

class CaseEmailTransformer extends TransformerAbstract
{
    public function transform(CaseEmail $CaseEmail)
    {
        return [
            'id' => $CaseEmail->id,
            'name' => $CaseEmail->name,
            'description' => $CaseEmail->description,
            'permissions' => $CaseEmail->permissions,
            'is_default' => $CaseEmail->is_default,
            'created_at' => $CaseEmail->created_at,
            'updated_at' => $CaseEmail->updated_at
        ];
    }
}
