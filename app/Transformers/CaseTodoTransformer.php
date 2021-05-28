<?php

namespace App\Transformers;

use App\Models\CaseTodo;
use League\Fractal\TransformerAbstract;

class CaseTodoTransformer extends TransformerAbstract
{
    public function transform(CaseTodo $CaseTodo)
    {
        return [
            'id' => $CaseTodo->id,
            'name' => $CaseTodo->name,
            'description' => $CaseTodo->description,
            'permissions' => $CaseTodo->permissions,
            'is_default' => $CaseTodo->is_default,
            'created_at' => $CaseTodo->created_at,
            'updated_at' => $CaseTodo->updated_at
        ];
    }
}
