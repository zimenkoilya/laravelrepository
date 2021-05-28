<?php

namespace App\Transformers;

use App\Models\StudentSubmissionLog;
use League\Fractal\TransformerAbstract;

class StudentSubmissionLogTransformer extends TransformerAbstract
{
    public function transform(StudentSubmissionLog $StudentSubmissionLog)
    {
        return [
            'id' => $StudentSubmissionLog->id,
            'name' => $StudentSubmissionLog->name,
            'data_template' => $StudentSubmissionLog->data_template,
            'type' => $StudentSubmissionLog->type,
            'url' => $StudentSubmissionLog->url,
            'active' => $StudentSubmissionLog->active,
            'created_at' => $StudentSubmissionLog->created_at,
            'updated_at' => $StudentSubmissionLog->updated_at,
        ];
    }
}
