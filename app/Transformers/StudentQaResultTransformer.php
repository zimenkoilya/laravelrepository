<?php

namespace App\Transformers;

use App\Models\StudentQaResult;
use League\Fractal\TransformerAbstract;

class StudentQaResultTransformer extends TransformerAbstract
{
    public function transform(StudentQaResult $StudentQaResult)
    {
        return [
            'id' => $StudentQaResult->id,
            'name' => $StudentQaResult->name,
            'data_template' => $StudentQaResult->data_template,
            'type' => $StudentQaResult->type,
            'url' => $StudentQaResult->url,
            'active' => $StudentQaResult->active,
            'created_at' => $StudentQaResult->created_at,
            'updated_at' => $StudentQaResult->updated_at,
        ];
    }
}
