<?php

namespace App\Transformers;

use App\Models\Role;
use League\Fractal\TransformerAbstract;

class RoleTransformer extends TransformerAbstract
{
    public function transform(Role $role)
    {
        return [
            'id' => $role->id,
            'name' => $role->name,
            'description' => $role->description,
            'permissions' => $role->permissions,
            'is_default' => $role->is_default,
            'created_at' => $role->created_at,
            'updated_at' => $role->updated_at
        ];
    }
}
