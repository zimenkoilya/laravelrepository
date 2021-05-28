<?php

namespace App\Transformers;

use App\Models\DashboardWidget;
use League\Fractal\TransformerAbstract;

class DashboardWidgetTransformer extends TransformerAbstract
{
    public function transform(DashboardWidget $DashboardWidget)
    {
        return [
            'id' => $DashboardWidget->id,
            'name' => $DashboardWidget->name,
            'description' => $DashboardWidget->description,
            'permissions' => $DashboardWidget->permissions,
            'is_default' => $DashboardWidget->is_default,
            'created_at' => $DashboardWidget->created_at,
            'updated_at' => $DashboardWidget->updated_at
        ];
    }
}
