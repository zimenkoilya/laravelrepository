<?php

namespace App\Transformers;

use App\Models\UserSetting;
use League\Fractal\TransformerAbstract;

class UserSettingTransformer extends TransformerAbstract
{
    public function transform(UserSetting $UserSetting)
    {
        return [
            'id' => $UserSetting->id,
            'name' => $UserSetting->name,
            'role' => $UserSetting->role,
        ];
    }
}
