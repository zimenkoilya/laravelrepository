<?php

namespace App\Transformers;

use App\Models\Gateway;
use League\Fractal\TransformerAbstract;

class GatewayTransformer extends TransformerAbstract
{
    public function transform(Gateway $Gateway)
    {
        return [
            'id' => $Gateway->id,
            'name' => $Gateway->name,
            'description' => $Gateway->description,
            'permissions' => $Gateway->permissions,
            'is_default' => $Gateway->is_default,
            'created_at' => $Gateway->created_at,
            'updated_at' => $Gateway->updated_at
        ];
    }
}
