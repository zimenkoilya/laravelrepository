<?php

namespace App\Transformers;

use App\Models\CaseContact;
use League\Fractal\TransformerAbstract;

class CaseContactTransformer extends TransformerAbstract
{
    public function transform(CaseContact $CaseContact)
    {
        return [
            'id' => $CaseContact->id,
            'name' => $CaseContact->name,
            'description' => $CaseContact->description,
            'permissions' => $CaseContact->permissions,
            'is_default' => $CaseContact->is_default,
            'created_at' => $CaseContact->created_at,
            'updated_at' => $CaseContact->updated_at
        ];
    }
}
