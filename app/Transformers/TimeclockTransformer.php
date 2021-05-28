<?php

namespace App\Transformers;

use App\Models\Timeclock;
use League\Fractal\TransformerAbstract;

class TimeclockTransformer extends TransformerAbstract
{
    public function transform(Timeclock $Timeclock)
    {
        return [
            'id' => $Timeclock->id,
            'name' => $Timeclock->name,
            'role' => $Timeclock->role,
        ];
    }
}
