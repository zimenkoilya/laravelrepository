<?php

namespace App\Transformers;

use App\Models\LogImport;
use League\Fractal\TransformerAbstract;

class LogImportTransformer extends TransformerAbstract
{
    public function transform(LogImport $LogImport)
    {
        return [
            'id' => $LogImport->id,
            'name' => $LogImport->name,
            'description' => $LogImport->description,
            'permissions' => $LogImport->permissions,
            'is_default' => $LogImport->is_default,
            'created_at' => $LogImport->created_at,
            'updated_at' => $LogImport->updated_at
        ];
    }
}
