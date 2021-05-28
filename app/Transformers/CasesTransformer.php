<?php

namespace App\Transformers;

use App\Models\Cases;
use League\Fractal\TransformerAbstract;

class CasesTransformer extends TransformerAbstract
{
    public function transform(Cases $Cases)
    {
        return [
            'id' => $Cases->id,
            'name' => $Cases->name,
            'description' => $Cases->description,
            'permissions' => $Cases->permissions,
            'is_default' => $Cases->is_default,
            'created_at' => $Cases->created_at,
            'updated_at' => $Cases->updated_at
        ];
    }
}
