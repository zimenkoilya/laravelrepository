<?php

namespace App\Transformers;

use App\Models\StudentQaIssue;
use League\Fractal\TransformerAbstract;

class StudentQaIssueTransformer extends TransformerAbstract
{
    public function transform(StudentQaIssue $StudentQaIssue)
    {
        return [
            'id' => $StudentQaIssue->id,
            'name' => $StudentQaIssue->name,
            'data_template' => $StudentQaIssue->data_template,
            'type' => $StudentQaIssue->type,
            'url' => $StudentQaIssue->url,
            'active' => $StudentQaIssue->active,
            'created_at' => $StudentQaIssue->created_at,
            'updated_at' => $StudentQaIssue->updated_at,
        ];
    }
}
