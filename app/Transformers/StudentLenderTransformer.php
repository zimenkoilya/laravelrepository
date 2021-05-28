<?php

namespace App\Transformers;

use App\Models\StudentLender;
use League\Fractal\TransformerAbstract;

class StudentLenderTransformer extends TransformerAbstract
{
    public function transform(StudentLender $StudentLender)
    {
        return [
            'id' => $StudentLender->id,
            'name' => $StudentLender->name,
            'data_template' => $StudentLender->data_template,
            'type' => $StudentLender->type,
            'url' => $StudentLender->url,
            'active' => $StudentLender->active,
            'created_at' => $StudentLender->created_at,
            'updated_at' => $StudentLender->updated_at,
        ];
    }
}
