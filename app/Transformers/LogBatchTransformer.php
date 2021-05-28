<?php

namespace App\Transformers;

use App\Models\LogBatch;
use League\Fractal\TransformerAbstract;

class LogBatchTransformer extends TransformerAbstract
{
    public function transform(LogBatch $LogBatch)
    {
        return [
            'id' => $LogBatch->id,
            'name' => $LogBatch->name,
            'description' => $LogBatch->description,
            'permissions' => $LogBatch->permissions,
            'is_default' => $LogBatch->is_default,
            'created_at' => $LogBatch->created_at,
            'updated_at' => $LogBatch->updated_at
        ];
    }
}
