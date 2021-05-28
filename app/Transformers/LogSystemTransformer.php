<?php

namespace App\Transformers;

use App\Models\LogSystem;
use League\Fractal\TransformerAbstract;

class LogSystemTransformer extends TransformerAbstract
{
    public function transform(LogSystem $LogSystem)
    {
        return [
            'id' => $LogSystem->id,
            'name' => $LogSystem->name,
            'description' => $LogSystem->description,
            'permissions' => $LogSystem->permissions,
            'is_default' => $LogSystem->is_default,
            'created_at' => $LogSystem->created_at,
            'updated_at' => $LogSystem->updated_at
        ];
    }
}
