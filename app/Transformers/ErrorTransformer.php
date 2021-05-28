<?php

namespace App\Transformers;

use App\Models\Error;
use League\Fractal\TransformerAbstract;

class ErrorTransformer extends TransformerAbstract
{
    public function transform(Error $Error)
    {
        return [
            'id' => $Error->id,
            'name' => $Error->name,
            'description' => $Error->description,
            'permissions' => $Error->permissions,
            'is_default' => $Error->is_default,
            'created_at' => $Error->created_at,
            'updated_at' => $Error->updated_at
        ];
    }
}
