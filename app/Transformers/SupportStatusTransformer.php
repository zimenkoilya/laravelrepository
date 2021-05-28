<?php

namespace App\Transformers;

use App\Models\SupportStatus;
use League\Fractal\TransformerAbstract;

class SupportStatusTransformer extends TransformerAbstract
{
    public function transform(SupportStatus $SupportStatus)
    {
        return [
            'id' => $SupportStatus->id,
            'name' => $SupportStatus->name,
            'data_template' => $SupportStatus->data_template,
            'type' => $SupportStatus->type,
            'url' => $SupportStatus->url,
            'active' => $SupportStatus->active,
            'created_at' => $SupportStatus->created_at,
            'updated_at' => $SupportStatus->updated_at,
        ];
    }
}
