<?php

namespace App\Transformers;

use App\Models\CaseAssignment;
use League\Fractal\TransformerAbstract;

class CaseAssignmentTransformer extends TransformerAbstract
{
    public function transform(CaseAssignment $CaseAssignment)
    {
        return [
            'id' => $CaseAssignment->id,
            'name' => $CaseAssignment->name,
            'description' => $CaseAssignment->description,
            'permissions' => $CaseAssignment->permissions,
            'is_default' => $CaseAssignment->is_default,
            'created_at' => $CaseAssignment->created_at,
            'updated_at' => $CaseAssignment->updated_at
        ];
    }
}
