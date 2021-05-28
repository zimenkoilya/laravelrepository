<?php

namespace App\Transformers;

use App\Models\UserProfile;
use League\Fractal\TransformerAbstract;

class UserProfileTransformer extends TransformerAbstract
{
    public function transform(UserProfile $UserProfile)
    {
        return [
            'id' => $UserProfile->id,
            'name' => $UserProfile->name,
            'role' => $UserProfile->role,
        ];
    }
}
