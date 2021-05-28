<?php

namespace App\Transformers;

use App\Models\LogStatus;
use League\Fractal\TransformerAbstract;

class LogStatusTransformer extends TransformerAbstract
{
    public function transform(LogStatus $LogStatus)
    {
        return [
            'id' => $LogStatus->id,
            'name' => $LogStatus->name,
            'description' => $LogStatus->description,
            'permissions' => $LogStatus->permissions,
            'is_default' => $LogStatus->is_default,
            'created_at' => $LogStatus->created_at,
            'updated_at' => $LogStatus->updated_at
        ];
    }
}
