<?php

namespace App\Transformers;

use App\Models\SupportTag;
use League\Fractal\TransformerAbstract;

class SupportTagTransformer extends TransformerAbstract
{
    public function transform(SupportTag $SupportTag)
    {
        return [
            'id' => $SupportTag->id,
            'name' => $SupportTag->name,
            'data_template' => $SupportTag->data_template,
            'type' => $SupportTag->type,
            'url' => $SupportTag->url,
            'active' => $SupportTag->active,
            'created_at' => $SupportTag->created_at,
            'updated_at' => $SupportTag->updated_at,
        ];
    }
}
