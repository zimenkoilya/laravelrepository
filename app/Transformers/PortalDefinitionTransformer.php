<?php

namespace App\Transformers;

use App\Models\PortalDefinition;
use League\Fractal\TransformerAbstract;

class PortalDefinitionTransformer extends TransformerAbstract
{
    public function transform(PortalDefinition $PortalDefinition)
    {
        return [
            'id' => $PortalDefinition->id,
            'name' => $PortalDefinition->name,
            'description' => $PortalDefinition->description,
            'permissions' => $PortalDefinition->permissions,
            'is_default' => $PortalDefinition->is_default,
            'created_at' => $PortalDefinition->created_at,
            'updated_at' => $PortalDefinition->updated_at
        ];
    }
}
