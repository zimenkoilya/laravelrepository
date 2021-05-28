<?php

namespace App\Transformers;

use App\Models\LogActionId;
use League\Fractal\TransformerAbstract;

class LogActionIdTransformer extends TransformerAbstract
{
    public function transform(LogActionId $LogActionId)
    {
        return [
            'id' => $LogActionId->id,
            'name' => $LogActionId->name,
            'description' => $LogActionId->description,
            'permissions' => $LogActionId->permissions,
            'is_default' => $LogActionId->is_default,
            'created_at' => $LogActionId->created_at,
            'updated_at' => $LogActionId->updated_at
        ];
    }
}
