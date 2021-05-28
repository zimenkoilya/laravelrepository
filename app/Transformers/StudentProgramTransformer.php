<?php

namespace App\Transformers;

use App\Models\StudentProgram;
use League\Fractal\TransformerAbstract;

class StudentProgramTransformer extends TransformerAbstract
{
    public function transform(StudentProgram $StudentProgram)
    {
        return [
            'id' => $StudentProgram->id,
            'name' => $StudentProgram->name,
            'data_template' => $StudentProgram->data_template,
            'type' => $StudentProgram->type,
            'url' => $StudentProgram->url,
            'active' => $StudentProgram->active,
            'created_at' => $StudentProgram->created_at,
            'updated_at' => $StudentProgram->updated_at,
        ];
    }
}
