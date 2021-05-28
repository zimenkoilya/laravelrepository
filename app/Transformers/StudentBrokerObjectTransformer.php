<?php

namespace App\Transformers;

use App\Models\StudentBrokerObject;
use League\Fractal\TransformerAbstract;

class StudentBrokerObjectTransformer extends TransformerAbstract
{
    public function transform(StudentBrokerObject $StudentBrokerObject)
    {
        return [
            'id' => $StudentBrokerObject->id,
            'name' => $StudentBrokerObject->name,
            'data_template' => $StudentBrokerObject->data_template,
            'type' => $StudentBrokerObject->type,
            'url' => $StudentBrokerObject->url,
            'active' => $StudentBrokerObject->active,
            'created_at' => $StudentBrokerObject->created_at,
            'updated_at' => $StudentBrokerObject->updated_at,
        ];
    }
}
