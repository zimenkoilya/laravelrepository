<?php

namespace App\Transformers;

use App\Models\Lists;
use League\Fractal\TransformerAbstract;

class ListsTransformer extends TransformerAbstract
{
    public function transform(Lists $Lists)
    {
        return [
            'id' => $Lists->id,
            'name' => $Lists->name,
            'description' => $Lists->description,
            'permissions' => $Lists->permissions,
            'is_default' => $Lists->is_default,
            'created_at' => $Lists->created_at,
            'updated_at' => $Lists->updated_at
        ];
    }
}
