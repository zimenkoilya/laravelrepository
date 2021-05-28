<?php

namespace App\Transformers;

use App\Models\MkDialerSchedule;
use League\Fractal\TransformerAbstract;

class MkDialerScheduleTransformer extends TransformerAbstract
{
    public function transform(MkDialerSchedule $MkDialerSchedule)
    {
        return [
            'id' => $MkDialerSchedule->id,
            'name' => $MkDialerSchedule->name,
            'description' => $MkDialerSchedule->description,
            'permissions' => $MkDialerSchedule->permissions,
            'is_default' => $MkDialerSchedule->is_default,
            'created_at' => $MkDialerSchedule->created_at,
            'updated_at' => $MkDialerSchedule->updated_at
        ];
    }
}
