<?php

namespace App\Transformers;

use App\Models\CaseInterviewLog;
use League\Fractal\TransformerAbstract;

class CaseInterviewLogTransformer extends TransformerAbstract
{
    public function transform(CaseInterviewLog $CaseInterviewLog)
    {
        return [
            'id' => $CaseInterviewLog->id,
            'name' => $CaseInterviewLog->name,
            'description' => $CaseInterviewLog->description,
            'permissions' => $CaseInterviewLog->permissions,
            'is_default' => $CaseInterviewLog->is_default,
            'created_at' => $CaseInterviewLog->created_at,
            'updated_at' => $CaseInterviewLog->updated_at
        ];
    }
}
