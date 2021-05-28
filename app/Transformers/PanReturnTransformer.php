<?php

namespace App\Transformers;

use App\Models\PanReturn;
use League\Fractal\TransformerAbstract;

class PanReturnTransformer extends TransformerAbstract
{
    public function transform(PanReturn $PanReturn)
    {
        return [
            'id' => $PanReturn->id,
            'name' => $PanReturn->name,
            'description' => $PanReturn->description,
            'permissions' => $PanReturn->permissions,
            'is_default' => $PanReturn->is_default,
            'created_at' => $PanReturn->created_at,
            'updated_at' => $PanReturn->updated_at
        ];
    }
}
