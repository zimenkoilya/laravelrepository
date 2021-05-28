<?php

namespace App\Transformers;

use App\Models\CallExtension;
use League\Fractal\TransformerAbstract;

class CallExtensionTransformer extends TransformerAbstract
{
    public function transform(CallExtension $CallExtension)
    {
        return [
            'id' => $CallExtension->id,
            'name' => $CallExtension->name,
            'description' => $CallExtension->description,
            'permissions' => $CallExtension->permissions,
            'is_default' => $CallExtension->is_default,
            'created_at' => $CallExtension->created_at,
            'updated_at' => $CallExtension->updated_at
        ];
    }
}
