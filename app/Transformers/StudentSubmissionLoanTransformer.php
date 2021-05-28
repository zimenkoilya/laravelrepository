<?php

namespace App\Transformers;

use App\Models\StudentSubmissionLoan;
use League\Fractal\TransformerAbstract;

class StudentSubmissionLoanTransformer extends TransformerAbstract
{
    public function transform(StudentSubmissionLoan $StudentSubmissionLoan)
    {
        return [
            'id' => $StudentSubmissionLoan->id,
            'name' => $StudentSubmissionLoan->name,
            'data_template' => $StudentSubmissionLoan->data_template,
            'type' => $StudentSubmissionLoan->type,
            'url' => $StudentSubmissionLoan->url,
            'active' => $StudentSubmissionLoan->active,
            'created_at' => $StudentSubmissionLoan->created_at,
            'updated_at' => $StudentSubmissionLoan->updated_at,
        ];
    }
}
