<?php

namespace App\Transformers;

use App\Models\LogFileImportDetail;
use League\Fractal\TransformerAbstract;

class LogFileImportDetailTransformer extends TransformerAbstract
{
    public function transform(LogFileImportDetail $LogFileImportDetail)
    {
        return [
            'id' => $LogFileImportDetail->id,
            'name' => $LogFileImportDetail->name,
            'description' => $LogFileImportDetail->description,
            'permissions' => $LogFileImportDetail->permissions,
            'is_default' => $LogFileImportDetail->is_default,
            'created_at' => $LogFileImportDetail->created_at,
            'updated_at' => $LogFileImportDetail->updated_at
        ];
    }
}
