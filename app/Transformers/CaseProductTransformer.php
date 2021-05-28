<?php

namespace App\Transformers;

use App\Models\CaseProduct;
use League\Fractal\TransformerAbstract;

class CaseProductTransformer extends TransformerAbstract
{
    public function transform(CaseProduct $CaseProduct)
    {
        return [
            'id' => $CaseProduct->id,
            'name' => $CaseProduct->name,
            'description' => $CaseProduct->description,
            'permissions' => $CaseProduct->permissions,
            'is_default' => $CaseProduct->is_default,
            'created_at' => $CaseProduct->created_at,
            'updated_at' => $CaseProduct->updated_at
        ];
    }
}
