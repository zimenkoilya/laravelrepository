<?php

namespace App\Transformers;

use App\Models\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    public function transform(User $user)
    {
        return [
            'id' => $user->id,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'email' => $user->email,
            'type' => $user->type,
            'region' => $user->region,
            'dashboard' => $user->dashboard,
            // 'role_names' => $user->role_names,
            'created_at' => $user->created_at,
            'updated_at' => $user->updated_at,
        ];
    }
}
