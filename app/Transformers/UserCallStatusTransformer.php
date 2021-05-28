<?php

namespace App\Transformers;

use App\Models\UserCallStatus;
use League\Fractal\TransformerAbstract;

class UserCallStatusTransformer extends TransformerAbstract
{
    public function transform(UserCallStatus $UserCallStatus)
    {
        return [
            'id' => $UserCallStatus->id,
            'name' => $UserCallStatus->name,
            'role' => $UserCallStatus->role,
        ];
    }
}
