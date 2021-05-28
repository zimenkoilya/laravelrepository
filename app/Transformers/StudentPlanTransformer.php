<?php

namespace App\Transformers;

use App\Models\StudentPlan;
use League\Fractal\TransformerAbstract;

class StudentPlanTransformer extends TransformerAbstract
{
    public function transform(StudentPlan $StudentPlan)
    {
        return [
            'id' => $StudentPlan->id,
            'name' => $StudentPlan->name,
            'data_template' => $StudentPlan->data_template,
            'type' => $StudentPlan->type,
            'url' => $StudentPlan->url,
            'active' => $StudentPlan->active,
            'created_at' => $StudentPlan->created_at,
            'updated_at' => $StudentPlan->updated_at,
        ];
    }
}
