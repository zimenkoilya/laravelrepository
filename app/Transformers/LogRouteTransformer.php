<?php

namespace App\Transformers;

use App\Models\LogRoute;
use League\Fractal\TransformerAbstract;

class LogRouteTransformer extends TransformerAbstract
{
    public function transform(LogRoute $LogRoute)
    {
        return [
            'id' => $LogRoute->id,
            'name' => $LogRoute->name,
            'description' => $LogRoute->description,
            'permissions' => $LogRoute->permissions,
            'is_default' => $LogRoute->is_default,
            'created_at' => $LogRoute->created_at,
            'updated_at' => $LogRoute->updated_at
        ];
    }
}
