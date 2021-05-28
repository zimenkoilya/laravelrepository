<?php

namespace App\Transformers;

use App\Models\LogMisc;
use League\Fractal\TransformerAbstract;

class LogMiscTransformer extends TransformerAbstract
{
    public function transform(LogMisc $LogMisc)
    {
        return [
            'id' => $LogMisc->id,
            'name' => $LogMisc->name,
            'description' => $LogMisc->description,
            'permissions' => $LogMisc->permissions,
            'is_default' => $LogMisc->is_default,
            'created_at' => $LogMisc->created_at,
            'updated_at' => $LogMisc->updated_at
        ];
    }
}
