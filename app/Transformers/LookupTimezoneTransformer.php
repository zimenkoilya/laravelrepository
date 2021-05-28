<?php

namespace App\Transformers;

use App\Models\LookupTimezone;
use League\Fractal\TransformerAbstract;

class LookupTimezoneTransformer extends TransformerAbstract
{
    public function transform(LookupTimezone $LookupTimezone)
    {
        return [
            'id' => $LookupTimezone->id,
            'name' => $LookupTimezone->name,
            'description' => $LookupTimezone->description,
            'permissions' => $LookupTimezone->permissions,
            'is_default' => $LookupTimezone->is_default,
            'created_at' => $LookupTimezone->created_at,
            'updated_at' => $LookupTimezone->updated_at
        ];
    }
}
