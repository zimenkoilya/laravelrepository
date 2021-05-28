<?php

namespace App\Transformers;

use App\Models\LogUserActivity;
use League\Fractal\TransformerAbstract;

class LogUserActivityTransformer extends TransformerAbstract
{
    public function transform(LogUserActivity $LogUserActivity)
    {
        return [
            'id' => $LogUserActivity->id,
            'name' => $LogUserActivity->name,
            'description' => $LogUserActivity->description,
            'permissions' => $LogUserActivity->permissions,
            'is_default' => $LogUserActivity->is_default,
            'created_at' => $LogUserActivity->created_at,
            'updated_at' => $LogUserActivity->updated_at
        ];
    }
}
