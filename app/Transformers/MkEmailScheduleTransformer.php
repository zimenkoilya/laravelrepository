<?php

namespace App\Transformers;

use App\Models\MkEmailSchedule;
use League\Fractal\TransformerAbstract;

class MkEmailScheduleTransformer extends TransformerAbstract
{
    public function transform(MkEmailSchedule $MkEmailSchedule)
    {
        return [
            'id' => $MkEmailSchedule->id,
            'name' => $MkEmailSchedule->name,
            'description' => $MkEmailSchedule->description,
            'permissions' => $MkEmailSchedule->permissions,
            'is_default' => $MkEmailSchedule->is_default,
            'created_at' => $MkEmailSchedule->created_at,
            'updated_at' => $MkEmailSchedule->updated_at
        ];
    }
}
