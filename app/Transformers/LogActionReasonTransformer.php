<?php

namespace App\Transformers;

use App\Models\LogActionReason;
use League\Fractal\TransformerAbstract;

class LogActionReasonTransformer extends TransformerAbstract
{
    public function transform(LogActionReason $LogActionReason)
    {
        return [
            'id' => $LogActionReason->id,
            'name' => $LogActionReason->name,
            'description' => $LogActionReason->description,
            'permissions' => $LogActionReason->permissions,
            'is_default' => $LogActionReason->is_default,
            'created_at' => $LogActionReason->created_at,
            'updated_at' => $LogActionReason->updated_at
        ];
    }
}
