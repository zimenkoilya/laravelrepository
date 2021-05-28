<?php

namespace App\Transformers;

use App\Models\UserActivity;
use League\Fractal\TransformerAbstract;

class UserActivityTransformer extends TransformerAbstract
{
    public function transform(UserActivity $UserActivity)
    {
        return [
            'id' => $UserActivity->id,
            'name' => $UserActivity->name,
            'role' => $UserActivity->role,
        ];
    }
}
