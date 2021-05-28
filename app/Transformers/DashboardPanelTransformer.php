<?php

namespace App\Transformers;

use App\Models\DashboardPanel;
use League\Fractal\TransformerAbstract;

class DashboardPanelTransformer extends TransformerAbstract
{
    public function transform(DashboardPanel $DashboardPanel)
    {
        return [
            'id' => $DashboardPanel->id,
            'name' => $DashboardPanel->name,
            'description' => $DashboardPanel->description,
            'permissions' => $DashboardPanel->permissions,
            'is_default' => $DashboardPanel->is_default,
            'created_at' => $DashboardPanel->created_at,
            'updated_at' => $DashboardPanel->updated_at
        ];
    }
}
