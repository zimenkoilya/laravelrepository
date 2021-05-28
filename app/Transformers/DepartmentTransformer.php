<?php

namespace App\Transformers;

use App\Models\Department;
use League\Fractal\TransformerAbstract;

class DepartmentTransformer extends TransformerAbstract
{
    public function transform(Department $department)
    {
        return [
            'id' => $department->id,
            'name' => $department->name,
            'clean_name' => $department->clean_name,
            'description' => $department->description,
            'created_at' => $department->created_at,
            'updated_at' => $department->updated_at,
            'users' => $department->users
        ];
    }
}
