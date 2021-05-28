<?php

namespace App\Transformers;

use App\Models\LogCommission;
use League\Fractal\TransformerAbstract;

class LogCommissionTransformer extends TransformerAbstract
{
    public function transform(LogCommission $LogCommission)
    {
        return [
            'id' => $LogCommission->id,
            'name' => $LogCommission->name,
            'description' => $LogCommission->description,
            'permissions' => $LogCommission->permissions,
            'is_default' => $LogCommission->is_default,
            'created_at' => $LogCommission->created_at,
            'updated_at' => $LogCommission->updated_at
        ];
    }
}
