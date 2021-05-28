<?php

namespace App\Transformers;

use App\Models\StudentQuote;
use League\Fractal\TransformerAbstract;

class StudentQuoteTransformer extends TransformerAbstract
{
    public function transform(StudentQuote $StudentQuote)
    {
        return [
            'id' => $StudentQuote->id,
            'name' => $StudentQuote->name,
            'data_template' => $StudentQuote->data_template,
            'type' => $StudentQuote->type,
            'url' => $StudentQuote->url,
            'active' => $StudentQuote->active,
            'created_at' => $StudentQuote->created_at,
            'updated_at' => $StudentQuote->updated_at,
        ];
    }
}
