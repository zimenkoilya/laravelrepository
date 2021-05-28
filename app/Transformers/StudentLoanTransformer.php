<?php

namespace App\Transformers;

use App\Models\StudentLoan;
use League\Fractal\TransformerAbstract;

class StudentLoanTransformer extends TransformerAbstract
{
    public function transform(StudentLoan $StudentLoan)
    {
        return [
            'id' => $StudentLoan->id,
            'name' => $StudentLoan->name,
            'data_template' => $StudentLoan->data_template,
            'type' => $StudentLoan->type,
            'url' => $StudentLoan->url,
            'active' => $StudentLoan->active,
            'created_at' => $StudentLoan->created_at,
            'updated_at' => $StudentLoan->updated_at,
        ];
    }
}
