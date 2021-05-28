<?php

namespace App\Transformers;

use App\Models\TimeclockFunction;
use League\Fractal\TransformerAbstract;

class TimeclockFunctionTransformer extends TransformerAbstract
{
    public function transform(TimeclockFunction $TimeclockFunction)
    {
        return [
            'id' => $TimeclockFunction->id,
            'name' => $TimeclockFunction->name,
            'role' => $TimeclockFunction->role,
        ];
    }
}
