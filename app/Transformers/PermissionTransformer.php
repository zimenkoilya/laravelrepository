<?php

namespace App\Transformers;

use App\Models\Permission;
use League\Fractal\TransformerAbstract;

class PermissionTransformer extends TransformerAbstract
{
    public function transform(Permission $permission)
    {
        return [
            'id' => $permission->id,
            'name' => $permission->name,
            'path' => $permission->path,
            'created_at' => $permission->created_at,
            'updated_at' => $permission->updated_at
        ];
    }
}
