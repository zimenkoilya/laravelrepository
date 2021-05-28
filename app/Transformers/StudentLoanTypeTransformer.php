<?php

namespace App\Transformers;

use App\Models\StudentLoanType;
use League\Fractal\TransformerAbstract;

class StudentLoanTypeTransformer extends TransformerAbstract
{
    public function transform(StudentLoanType $StudentLoanType)
    {
        return [
            'id' => $StudentLoanType->id,
            'name' => $StudentLoanType->name,
            'data_template' => $StudentLoanType->data_template,
            'type' => $StudentLoanType->type,
            'url' => $StudentLoanType->url,
            'active' => $StudentLoanType->active,
            'created_at' => $StudentLoanType->created_at,
            'updated_at' => $StudentLoanType->updated_at,
        ];
    }
}
