<?php

namespace App\Transformers;

use App\Models\StudentSubmissionDoc;
use League\Fractal\TransformerAbstract;

class StudentSubmissionDocTransformer extends TransformerAbstract
{
    public function transform(StudentSubmissionDoc $StudentSubmissionDoc)
    {
        return [
            'id' => $StudentSubmissionDoc->id,
            'name' => $StudentSubmissionDoc->name,
            'data_template' => $StudentSubmissionDoc->data_template,
            'type' => $StudentSubmissionDoc->type,
            'url' => $StudentSubmissionDoc->url,
            'active' => $StudentSubmissionDoc->active,
            'created_at' => $StudentSubmissionDoc->created_at,
            'updated_at' => $StudentSubmissionDoc->updated_at,
        ];
    }
}
