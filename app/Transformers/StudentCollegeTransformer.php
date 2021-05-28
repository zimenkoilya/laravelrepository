<?php

namespace App\Transformers;

use App\Models\StudentCollege;
use League\Fractal\TransformerAbstract;

class StudentCollegeTransformer extends TransformerAbstract
{
    public function transform(StudentCollege $StudentCollege)
    {
        return [
            'id' => $StudentCollege->id,
            'name' => $StudentCollege->name,
            'data_template' => $StudentCollege->data_template,
            'type' => $StudentCollege->type,
            'url' => $StudentCollege->url,
            'active' => $StudentCollege->active,
            'created_at' => $StudentCollege->created_at,
            'updated_at' => $StudentCollege->updated_at,
        ];
    }
}
