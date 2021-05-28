<?php

namespace App\Transformers;

use App\Models\DuplicateGroup;
use League\Fractal\TransformerAbstract;

class DuplicateGroupTransformer extends TransformerAbstract
{
    public function transform(DuplicateGroup $DuplicateGroup)
    {
        return [
            'id' => $DuplicateGroup->id,
            'name' => $DuplicateGroup->name,
            'description' => $DuplicateGroup->description,
            'permissions' => $DuplicateGroup->permissions,
            'is_default' => $DuplicateGroup->is_default,
            'created_at' => $DuplicateGroup->created_at,
            'updated_at' => $DuplicateGroup->updated_at
        ];
    }
}
