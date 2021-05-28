<?php

namespace App\Transformers;

use App\Models\StudentQuoteFactor;
use League\Fractal\TransformerAbstract;

class StudentQuoteFactorTransformer extends TransformerAbstract
{
    public function transform(StudentQuoteFactor $StudentQuoteFactor)
    {
        return [
            'id' => $StudentQuoteFactor->id,
            'name' => $StudentQuoteFactor->name,
            'data_template' => $StudentQuoteFactor->data_template,
            'type' => $StudentQuoteFactor->type,
            'url' => $StudentQuoteFactor->url,
            'active' => $StudentQuoteFactor->active,
            'created_at' => $StudentQuoteFactor->created_at,
            'updated_at' => $StudentQuoteFactor->updated_at,
        ];
    }
}
