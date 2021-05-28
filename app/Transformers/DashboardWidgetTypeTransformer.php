<?php

namespace App\Transformers;

use App\Models\DashboardWidgetType;
use League\Fractal\TransformerAbstract;

class DashboardWidgetTypeTransformer extends TransformerAbstract
{
    public function transform(DashboardWidgetType $DashboardWidgetType)
    {
        return [
            'id' => $DashboardWidgetType->id,
            'name' => $DashboardWidgetType->name,
            'description' => $DashboardWidgetType->description,
            'permissions' => $DashboardWidgetType->permissions,
            'is_default' => $DashboardWidgetType->is_default,
            'created_at' => $DashboardWidgetType->created_at,
            'updated_at' => $DashboardWidgetType->updated_at
        ];
    }
}
