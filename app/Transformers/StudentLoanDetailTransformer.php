<?php

namespace App\Transformers;

use App\Models\StudentLoanDetail;
use League\Fractal\TransformerAbstract;

class StudentLoanDetailTransformer extends TransformerAbstract
{
    public function transform(StudentLoanDetail $StudentLoanDetail)
    {
        return [
            'id' => $StudentLoanDetail->id,
            'name' => $StudentLoanDetail->name,
            'data_template' => $StudentLoanDetail->data_template,
            'type' => $StudentLoanDetail->type,
            'url' => $StudentLoanDetail->url,
            'active' => $StudentLoanDetail->active,
            'created_at' => $StudentLoanDetail->created_at,
            'updated_at' => $StudentLoanDetail->updated_at,
        ];
    }
}
