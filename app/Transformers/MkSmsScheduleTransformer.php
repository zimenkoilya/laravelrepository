<?php

namespace App\Transformers;

use App\Models\MkSmsSchedule;
use League\Fractal\TransformerAbstract;

class MkSmsScheduleTransformer extends TransformerAbstract
{
    public function transform(MkSmsSchedule $MkSmsSchedule)
    {
        return [
            'id' => $MkSmsSchedule->id,
            'name' => $MkSmsSchedule->name,
            'description' => $MkSmsSchedule->description,
            'permissions' => $MkSmsSchedule->permissions,
            'is_default' => $MkSmsSchedule->is_default,
            'created_at' => $MkSmsSchedule->created_at,
            'updated_at' => $MkSmsSchedule->updated_at
        ];
    }
}
