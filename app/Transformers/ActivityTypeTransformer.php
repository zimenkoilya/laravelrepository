<?php

namespace App\Transformers;

use App\Models\ActivityType;
use League\Fractal\TransformerAbstract;

class ActivityTypeTransformer extends TransformerAbstract
{
    public function transform(ActivityType $activityType)
    {
        return [
            'id' => $activityType->id,
            'name' => $activityType->name,
            'color' => $activityType->color,
            'created_at' => $activityType->created_at,
            'updated_at' => $activityType->updated_at,
        ];
    }
}
