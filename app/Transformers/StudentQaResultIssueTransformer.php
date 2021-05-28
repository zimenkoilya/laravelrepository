<?php

namespace App\Transformers;

use App\Models\StudentQaResultIssue;
use League\Fractal\TransformerAbstract;

class StudentQaResultIssueTransformer extends TransformerAbstract
{
    public function transform(StudentQaResultIssue $StudentQaResultIssue)
    {
        return [
            'id' => $StudentQaResultIssue->id,
            'name' => $StudentQaResultIssue->name,
            'data_template' => $StudentQaResultIssue->data_template,
            'type' => $StudentQaResultIssue->type,
            'url' => $StudentQaResultIssue->url,
            'active' => $StudentQaResultIssue->active,
            'created_at' => $StudentQaResultIssue->created_at,
            'updated_at' => $StudentQaResultIssue->updated_at,
        ];
    }
}
