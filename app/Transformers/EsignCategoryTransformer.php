<?php

namespace App\Transformers;

use App\Models\EsignCategory;
use League\Fractal\TransformerAbstract;

class EsignCategoryTransformer extends TransformerAbstract
{
    public function transform(EsignCategory $EsignCategory)
    {
        return [
            'id' => $EsignCategory->id,
            'name' => $EsignCategory->name,
            'description' => $EsignCategory->description,
            'permissions' => $EsignCategory->permissions,
            'is_default' => $EsignCategory->is_default,
            'created_at' => $EsignCategory->created_at,
            'updated_at' => $EsignCategory->updated_at
        ];
    }
}
