<?php

namespace App\Transformers;

use App\Models\TemplateNotification;
use League\Fractal\TransformerAbstract;

class TemplateNotificationTransformer extends TransformerAbstract
{
    public function transform(TemplateNotification $TemplateNotification)
    {
        return [
            'id' => $TemplateNotification->id,
            'name' => $TemplateNotification->name,
            'data_template' => $TemplateNotification->data_template,
            'type' => $TemplateNotification->type,
            'url' => $TemplateNotification->url,
            'active' => $TemplateNotification->active,
            'created_at' => $TemplateNotification->created_at,
            'updated_at' => $TemplateNotification->updated_at,
        ];
    }
}
