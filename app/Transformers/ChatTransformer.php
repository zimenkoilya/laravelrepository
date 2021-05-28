<?php

namespace App\Transformers;

use App\Models\Chat;
use League\Fractal\TransformerAbstract;

class ChatTransformer extends TransformerAbstract
{
    public function transform(Chat $Chat)
    {
        return [
            'id' => $Chat->id,
            'name' => $Chat->name,
            'description' => $Chat->description,
            'permissions' => $Chat->permissions,
            'is_default' => $Chat->is_default,
            'created_at' => $Chat->created_at,
            'updated_at' => $Chat->updated_at
        ];
    }
}
