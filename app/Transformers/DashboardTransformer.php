<?php

namespace App\Transformers;

use App\Models\Dashboard;
use League\Fractal\TransformerAbstract;

class DashboardTransformer extends TransformerAbstract
{
    public function transform(Dashboard $Dashboard)
    {
        return [
            'id' => $Dashboard->id,
            'name' => $Dashboard->name,
            'description' => $Dashboard->description,
            'permissions' => $Dashboard->permissions,
            'is_default' => $Dashboard->is_default,
            'created_at' => $Dashboard->created_at,
            'updated_at' => $Dashboard->updated_at
        ];
    }
}
