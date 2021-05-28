<?php

namespace App\Transformers;

use App\Models\PortalUser;
use League\Fractal\TransformerAbstract;

class PortalUserTransformer extends TransformerAbstract
{
    public function transform(PortalUser $PortalUser)
    {
        return [
            'id' => $PortalUser->id,
            'name' => $PortalUser->name,
            'description' => $PortalUser->description,
            'permissions' => $PortalUser->permissions,
            'is_default' => $PortalUser->is_default,
            'created_at' => $PortalUser->created_at,
            'updated_at' => $PortalUser->updated_at
        ];
    }
}
