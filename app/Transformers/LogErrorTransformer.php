<?php

namespace App\Transformers;

use App\Models\LogError;
use League\Fractal\TransformerAbstract;

class LogErrorTransformer extends TransformerAbstract
{
    public function transform(LogError $LogError)
    {
        return [
            'id' => $LogError->id,
            'name' => $LogError->name,
            'description' => $LogError->description,
            'permissions' => $LogError->permissions,
            'is_default' => $LogError->is_default,
            'created_at' => $LogError->created_at,
            'updated_at' => $LogError->updated_at
        ];
    }
}
