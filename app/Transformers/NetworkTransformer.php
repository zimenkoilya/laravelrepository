<?php

namespace App\Transformers;

use App\Models\Network;
use League\Fractal\TransformerAbstract;

class NetworkTransformer extends TransformerAbstract
{
    public function transform(Network $Network)
    {
        return [
            'id' => $Network->id,
            'name' => $Network->name,
            'description' => $Network->description,
            'permissions' => $Network->permissions,
            'is_default' => $Network->is_default,
            'created_at' => $Network->created_at,
            'updated_at' => $Network->updated_at
        ];
    }
}
