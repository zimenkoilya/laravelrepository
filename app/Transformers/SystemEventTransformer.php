<?php

namespace App\Transformers;

use App\Models\SystemEvent;
use League\Fractal\TransformerAbstract;

class SystemEventTransformer extends TransformerAbstract
{
    public function transform(SystemEvent $SystemEvent)
    {
        return [
            'id' => $SystemEvent->id,
            'name' => $SystemEvent->name,
            'data_template' => $SystemEvent->data_template,
            'type' => $SystemEvent->type,
            'url' => $SystemEvent->url,
            'active' => $SystemEvent->active,
            'created_at' => $SystemEvent->created_at,
            'updated_at' => $SystemEvent->updated_at,
        ];
    }
}
