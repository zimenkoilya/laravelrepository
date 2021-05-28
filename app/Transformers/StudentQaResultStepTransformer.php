<?php

namespace App\Transformers;

use App\Models\StudentQaResultStep;
use League\Fractal\TransformerAbstract;

class StudentQaResultStepTransformer extends TransformerAbstract
{
    public function transform(StudentQaResultStep $StudentQaResultStep)
    {
        return [
            'id' => $StudentQaResultStep->id,
            'name' => $StudentQaResultStep->name,
            'data_template' => $StudentQaResultStep->data_template,
            'type' => $StudentQaResultStep->type,
            'url' => $StudentQaResultStep->url,
            'active' => $StudentQaResultStep->active,
            'created_at' => $StudentQaResultStep->created_at,
            'updated_at' => $StudentQaResultStep->updated_at,
        ];
    }
}
