<?php

namespace App\Transformers;

use App\Models\Report;
use League\Fractal\TransformerAbstract;

class ReportTransformer extends TransformerAbstract
{
    public function transform(Report $Report)
    {
        return [
            'id' => $Report->id,
            'name' => $Report->name,
            'description' => $Report->description,
            'permissions' => $Report->permissions,
            'is_default' => $Report->is_default,
            'created_at' => $Report->created_at,
            'updated_at' => $Report->updated_at
        ];
    }
}
