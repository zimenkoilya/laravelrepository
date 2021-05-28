<?php

namespace App\Transformers;

use App\Models\SupportCategory;
use League\Fractal\TransformerAbstract;

class SupportCategoryTransformer extends TransformerAbstract
{
    public function transform(SupportCategory $SupportCategory)
    {
        return [
            'id' => $SupportCategory->id,
            'name' => $SupportCategory->name,
            'data_template' => $SupportCategory->data_template,
            'type' => $SupportCategory->type,
            'url' => $SupportCategory->url,
            'active' => $SupportCategory->active,
            'created_at' => $SupportCategory->created_at,
            'updated_at' => $SupportCategory->updated_at,
        ];
    }
}
