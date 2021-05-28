<?php

namespace App\Transformers;

use App\Models\KbCategory;
use League\Fractal\TransformerAbstract;

class KbCategoryTransformer extends TransformerAbstract
{
    public function transform(KbCategory $KbCategory)
    {
        return [
            'id' => $KbCategory->id,
            'name' => $KbCategory->name,
            'description' => $KbCategory->description,
            'permissions' => $KbCategory->permissions,
            'is_default' => $KbCategory->is_default,
            'created_at' => $KbCategory->created_at,
            'updated_at' => $KbCategory->updated_at
        ];
    }
}
