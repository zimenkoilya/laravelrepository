<?php

namespace App\Transformers;

use App\Models\ProductIndex;
use League\Fractal\TransformerAbstract;

class ProductIndexTransformer extends TransformerAbstract
{
    public function transform(ProductIndex $ProductIndex)
    {
        return [
            'id' => $ProductIndex->id,
            'name' => $ProductIndex->name,
            'description' => $ProductIndex->description,
            'permissions' => $ProductIndex->permissions,
            'is_default' => $ProductIndex->is_default,
            'created_at' => $ProductIndex->created_at,
            'updated_at' => $ProductIndex->updated_at
        ];
    }
}
