<?php

namespace App\Transformers;

use App\Models\PortalMilestone;
use League\Fractal\TransformerAbstract;

class PortalMilestoneTransformer extends TransformerAbstract
{
    public function transform(PortalMilestone $PortalMilestone)
    {
        return [
            'id' => $PortalMilestone->id,
            'name' => $PortalMilestone->name,
            'description' => $PortalMilestone->description,
            'permissions' => $PortalMilestone->permissions,
            'is_default' => $PortalMilestone->is_default,
            'created_at' => $PortalMilestone->created_at,
            'updated_at' => $PortalMilestone->updated_at
        ];
    }
}
