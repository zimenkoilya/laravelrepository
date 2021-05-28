<?php

namespace App\Transformers;

use App\Models\StudentRenewalResult;
use League\Fractal\TransformerAbstract;

class StudentRenewalResultTransformer extends TransformerAbstract
{
    public function transform(StudentRenewalResult $StudentRenewalResult)
    {
        return [
            'id' => $StudentRenewalResult->id,
            'name' => $StudentRenewalResult->name,
            'data_template' => $StudentRenewalResult->data_template,
            'type' => $StudentRenewalResult->type,
            'url' => $StudentRenewalResult->url,
            'active' => $StudentRenewalResult->active,
            'created_at' => $StudentRenewalResult->created_at,
            'updated_at' => $StudentRenewalResult->updated_at,
        ];
    }
}
