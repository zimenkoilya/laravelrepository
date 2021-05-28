<?php

namespace App\Transformers;

use App\Models\SystemFeature;
use League\Fractal\TransformerAbstract;

class SystemFeatureTransformer extends TransformerAbstract
{
    public function transform(SystemFeature $SystemFeature)
    {
        return [
            'id' => $SystemFeature->id,
            'name' => $SystemFeature->name,
            'data_template' => $SystemFeature->data_template,
            'type' => $SystemFeature->type,
            'url' => $SystemFeature->url,
            'active' => $SystemFeature->active,
            'created_at' => $SystemFeature->created_at,
            'updated_at' => $SystemFeature->updated_at,
        ];
    }
}
