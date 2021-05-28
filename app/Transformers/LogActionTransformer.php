<?php

namespace App\Transformers;

use App\Models\LogAction;
use League\Fractal\TransformerAbstract;

class LogActionTransformer extends TransformerAbstract
{
    public function transform(LogAction $LogAction)
    {
        return [
            'id' => $LogAction->id,
            'name' => $LogAction->name,
            'description' => $LogAction->description,
            'permissions' => $LogAction->permissions,
            'is_default' => $LogAction->is_default,
            'created_at' => $LogAction->created_at,
            'updated_at' => $LogAction->updated_at
        ];
    }
}
