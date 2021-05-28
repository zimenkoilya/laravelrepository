<?php

namespace App\Transformers;

use App\Models\NetworkShare;
use League\Fractal\TransformerAbstract;

class NetworkShareTransformer extends TransformerAbstract
{
    public function transform(NetworkShare $NetworkShare)
    {
        return [
            'id' => $NetworkShare->id,
            'name' => $NetworkShare->name,
            'description' => $NetworkShare->description,
            'permissions' => $NetworkShare->permissions,
            'is_default' => $NetworkShare->is_default,
            'created_at' => $NetworkShare->created_at,
            'updated_at' => $NetworkShare->updated_at
        ];
    }
}
