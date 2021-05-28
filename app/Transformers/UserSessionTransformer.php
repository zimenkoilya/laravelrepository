<?php

namespace App\Transformers;

use App\Models\UserSession;
use League\Fractal\TransformerAbstract;

class UserSessionTransformer extends TransformerAbstract
{
    public function transform(UserSession $UserSession)
    {
        return [
            'id' => $UserSession->id,
            'name' => $UserSession->name,
            'role' => $UserSession->role,
        ];
    }
}
