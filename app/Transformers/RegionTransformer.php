<?php

namespace App\Transformers;

use App\Models\Region;
use League\Fractal\TransformerAbstract;

class RegionTransformer extends TransformerAbstract
{
    public function transform(Region $Region)
    {
        return [
            'id' => $Region->id,
            'name' => $Region->name,
            'description' => $Region->description,
            'permissions' => $Region->permissions,
            'is_default' => $Region->is_default,
            'created_at' => $Region->created_at,
            'updated_at' => $Region->updated_at
        ];
    }
}
