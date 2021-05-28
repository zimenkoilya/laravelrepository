<?php

namespace App\Transformers;

use App\Models\StudentServiceTitle;
use League\Fractal\TransformerAbstract;

class StudentServiceTitleTransformer extends TransformerAbstract
{
    public function transform(StudentServiceTitle $StudentServiceTitle)
    {
        return [
            'id' => $StudentServiceTitle->id,
            'name' => $StudentServiceTitle->name,
            'data_template' => $StudentServiceTitle->data_template,
            'type' => $StudentServiceTitle->type,
            'url' => $StudentServiceTitle->url,
            'active' => $StudentServiceTitle->active,
            'created_at' => $StudentServiceTitle->created_at,
            'updated_at' => $StudentServiceTitle->updated_at,
        ];
    }
}
