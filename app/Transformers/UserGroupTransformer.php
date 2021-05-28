<?php

namespace App\Transformers;

use App\Models\UserGroup;
use League\Fractal\TransformerAbstract;

class UserGroupTransformer extends TransformerAbstract
{
    public function transform(UserGroup $UserGroup)
    {
        return [
            'id' => $UserGroup->id,
            'name' => $UserGroup->name,
            'role' => $UserGroup->role,
        ];
    }
}
