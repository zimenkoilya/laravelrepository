<?php

namespace App\Transformers;

use App\Models\StudentSubmission;
use League\Fractal\TransformerAbstract;

class StudentSubmissionTransformer extends TransformerAbstract
{
    public function transform(StudentSubmission $StudentSubmission)
    {
        return [
            'id' => $StudentSubmission->id,
            'name' => $StudentSubmission->name,
            'data_template' => $StudentSubmission->data_template,
            'type' => $StudentSubmission->type,
            'url' => $StudentSubmission->url,
            'active' => $StudentSubmission->active,
            'created_at' => $StudentSubmission->created_at,
            'updated_at' => $StudentSubmission->updated_at,
        ];
    }
}
