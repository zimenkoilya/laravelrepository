<?php

namespace App\Transformers;

use App\Models\StudentBrokerCase;
use League\Fractal\TransformerAbstract;

class StudentBrokerCaseTransformer extends TransformerAbstract
{
    public function transform(StudentBrokerCase $StudentBrokerCase)
    {
        return [
            'id' => $StudentBrokerCase->id,
            'name' => $StudentBrokerCase->name,
            'data_template' => $StudentBrokerCase->data_template,
            'type' => $StudentBrokerCase->type,
            'url' => $StudentBrokerCase->url,
            'active' => $StudentBrokerCase->active,
            'created_at' => $StudentBrokerCase->created_at,
            'updated_at' => $StudentBrokerCase->updated_at,
        ];
    }
}
