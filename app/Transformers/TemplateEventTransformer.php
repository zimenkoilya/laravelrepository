<?php

namespace App\Transformers;

use App\Models\TemplateEvent;
use League\Fractal\TransformerAbstract;

class TemplateEventTransformer extends TransformerAbstract
{
    public function transform(TemplateEvent $TemplateEvent)
    {
        return [
            'id' => $TemplateEvent->id,
            'name' => $TemplateEvent->name,
            'data_template' => $TemplateEvent->data_template,
            'type' => $TemplateEvent->type,
            'url' => $TemplateEvent->url,
            'active' => $TemplateEvent->active,
            'created_at' => $TemplateEvent->created_at,
            'updated_at' => $TemplateEvent->updated_at,
        ];
    }
}
