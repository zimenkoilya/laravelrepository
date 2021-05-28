<?php

namespace App\Transformers;

use App\Models\Activity;
use League\Fractal\TransformerAbstract;

class ActivityTransformer extends TransformerAbstract
{
    public function transform(Activity $activity)
    {
        return [
            'id' => $activity->id,
            'name' => $activity->name,
            'view' => $activity->view,
            'created_at' => $activity->created_at,
            'updated_at' => $activity->updated_at,
        ];
    }
}
