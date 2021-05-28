<?php

namespace App\Transformers;

use App\Models\StudentBrokerEvent;
use League\Fractal\TransformerAbstract;

class StudentBrokerEventTransformer extends TransformerAbstract
{
    public function transform(StudentBrokerEvent $StudentBrokerEvent)
    {
        return [
            'id' => $StudentBrokerEvent->id,
            'name' => $StudentBrokerEvent->name,
            'data_template' => $StudentBrokerEvent->data_template,
            'type' => $StudentBrokerEvent->type,
            'url' => $StudentBrokerEvent->url,
            'active' => $StudentBrokerEvent->active,
            'created_at' => $StudentBrokerEvent->created_at,
            'updated_at' => $StudentBrokerEvent->updated_at,
        ];
    }
}
