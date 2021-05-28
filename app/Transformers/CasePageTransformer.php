<?php

namespace App\Transformers;

use App\Models\CasePage;
use League\Fractal\TransformerAbstract;

class CasePageTransformer extends TransformerAbstract
{
    public function transform(CasePage $CasePage)
    {
        return [
            'id' => $CasePage->id,
            'name' => $CasePage->name,
            'description' => $CasePage->description,
            'permissions' => $CasePage->permissions,
            'is_default' => $CasePage->is_default,
            'created_at' => $CasePage->created_at,
            'updated_at' => $CasePage->updated_at
        ];
    }
}
