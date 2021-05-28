<?php

namespace App\Transformers;

use App\Models\StudentServiceValue;
use League\Fractal\TransformerAbstract;

class StudentServiceValueTransformer extends TransformerAbstract
{
    public function transform(StudentServiceValue $StudentServiceValue)
    {
        return [
            'id' => $StudentServiceValue->id,
            'name' => $StudentServiceValue->name,
            'data_template' => $StudentServiceValue->data_template,
            'type' => $StudentServiceValue->type,
            'url' => $StudentServiceValue->url,
            'active' => $StudentServiceValue->active,
            'created_at' => $StudentServiceValue->created_at,
            'updated_at' => $StudentServiceValue->updated_at,
        ];
    }
}
