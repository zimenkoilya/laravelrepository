<?php

namespace App\Transformers;

use App\Models\StudentRenewal;
use League\Fractal\TransformerAbstract;

class StudentRenewalTransformer extends TransformerAbstract
{
    public function transform(StudentRenewal $StudentRenewal)
    {
        return [
            'id' => $StudentRenewal->id,
            'name' => $StudentRenewal->name,
            'data_template' => $StudentRenewal->data_template,
            'type' => $StudentRenewal->type,
            'url' => $StudentRenewal->url,
            'active' => $StudentRenewal->active,
            'created_at' => $StudentRenewal->created_at,
            'updated_at' => $StudentRenewal->updated_at,
        ];
    }
}
