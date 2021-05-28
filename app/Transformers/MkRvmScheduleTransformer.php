<?php

namespace App\Transformers;

use App\Models\MkRvmSchedule;
use League\Fractal\TransformerAbstract;

class MkRvmScheduleTransformer extends TransformerAbstract
{
    public function transform(MkRvmSchedule $MkRvmSchedule)
    {
        return [
            'id' => $MkRvmSchedule->id,
            'name' => $MkRvmSchedule->name,
            'description' => $MkRvmSchedule->description,
            'permissions' => $MkRvmSchedule->permissions,
            'is_default' => $MkRvmSchedule->is_default,
            'created_at' => $MkRvmSchedule->created_at,
            'updated_at' => $MkRvmSchedule->updated_at
        ];
    }
}
