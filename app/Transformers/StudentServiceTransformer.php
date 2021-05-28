<?php

namespace App\Transformers;

use App\Models\StudentService;
use League\Fractal\TransformerAbstract;

class StudentServiceTransformer extends TransformerAbstract
{
    public function transform(StudentService $StudentService)
    {
        return [
            'id' => $StudentService->id,
            'name' => $StudentService->name,
            'data_template' => $StudentService->data_template,
            'type' => $StudentService->type,
            'url' => $StudentService->url,
            'active' => $StudentService->active,
            'created_at' => $StudentService->created_at,
            'updated_at' => $StudentService->updated_at,
        ];
    }
}
