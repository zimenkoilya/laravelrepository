<?php

namespace App\Transformers;

use App\Models\PanLog;
use League\Fractal\TransformerAbstract;

class PanLogTransformer extends TransformerAbstract
{
    public function transform(PanLog $PanLog)
    {
        return [
            'id' => $PanLog->id,
            'name' => $PanLog->name,
            'description' => $PanLog->description,
            'permissions' => $PanLog->permissions,
            'is_default' => $PanLog->is_default,
            'created_at' => $PanLog->created_at,
            'updated_at' => $PanLog->updated_at
        ];
    }
}
