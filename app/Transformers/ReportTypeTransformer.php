<?php

namespace App\Transformers;

use App\Models\ReportType;
use League\Fractal\TransformerAbstract;

class ReportTypeTransformer extends TransformerAbstract
{
    public function transform(ReportType $ReportType)
    {
        return [
            'id' => $ReportType->id,
            'name' => $ReportType->name,
            'description' => $ReportType->description,
            'permissions' => $ReportType->permissions,
            'is_default' => $ReportType->is_default,
            'created_at' => $ReportType->created_at,
            'updated_at' => $ReportType->updated_at
        ];
    }
}
