<?php

namespace App\Transformers;

use App\Models\LogExport;
use League\Fractal\TransformerAbstract;

class LogExportTransformer extends TransformerAbstract
{
    public function transform(LogExport $LogExport)
    {
        return [
            'id' => $LogExport->id,
            'name' => $LogExport->name,
            'description' => $LogExport->description,
            'permissions' => $LogExport->permissions,
            'is_default' => $LogExport->is_default,
            'created_at' => $LogExport->created_at,
            'updated_at' => $LogExport->updated_at
        ];
    }
}
