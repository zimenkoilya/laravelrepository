<?php

namespace App\Transformers;

use App\Models\Email;
use League\Fractal\TransformerAbstract;

class EmailTransformer extends TransformerAbstract
{
    public function transform(Email $Email)
    {
        return [
            'id' => $Email->id,
            'name' => $Email->name,
            'description' => $Email->description,
            'permissions' => $Email->permissions,
            'is_default' => $Email->is_default,
            'created_at' => $Email->created_at,
            'updated_at' => $Email->updated_at
        ];
    }
}
