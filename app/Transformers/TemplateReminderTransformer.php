<?php

namespace App\Transformers;

use App\Models\TemplateReminder;
use League\Fractal\TransformerAbstract;

class TemplateReminderTransformer extends TransformerAbstract
{
    public function transform(TemplateReminder $TemplateReminder)
    {
        return [
            'id' => $TemplateReminder->id,
            'name' => $TemplateReminder->name,
            'data_template' => $TemplateReminder->data_template,
            'type' => $TemplateReminder->type,
            'url' => $TemplateReminder->url,
            'active' => $TemplateReminder->active,
            'created_at' => $TemplateReminder->created_at,
            'updated_at' => $TemplateReminder->updated_at,
        ];
    }
}
