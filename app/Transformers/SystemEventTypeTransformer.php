<?php

namespace App\Transformers;

use App\Models\SystemEventType;
use League\Fractal\TransformerAbstract;

class SystemEventTypeTransformer extends TransformerAbstract
{
    public function transform(SystemEventType $SystemEventType)
    {
        return [
            'id' => $SystemEventType->id,
            'name' => $SystemEventType->name,
            'data_template' => $SystemEventType->data_template,
            'type' => $SystemEventType->type,
            'url' => $SystemEventType->url,
            'active' => $SystemEventType->active,
            'created_at' => $SystemEventType->created_at,
            'updated_at' => $SystemEventType->updated_at,
        ];
    }
}
