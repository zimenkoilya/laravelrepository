<?php

namespace App\Transformers;

use App\Models\CalendarOption;
use League\Fractal\TransformerAbstract;

class CalendarOptionTransformer extends TransformerAbstract
{
    public function transform(CalendarOption $CalendarOption)
    {
        return [
            'id' => $CalendarOption->id,
            'name' => $CalendarOption->name,
            'description' => $CalendarOption->description,
            'permissions' => $CalendarOption->permissions,
            'is_default' => $CalendarOption->is_default,
            'created_at' => $CalendarOption->created_at,
            'updated_at' => $CalendarOption->updated_at
        ];
    }
}
