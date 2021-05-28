<?php

namespace App\Transformers;

use App\Models\PanActivity;
use League\Fractal\TransformerAbstract;

class PanActivityTransformer extends TransformerAbstract
{
    public function transform(PanActivity $PanActivity)
    {
        return [
            'id' => $PanActivity->id,
            'name' => $PanActivity->name,
            'description' => $PanActivity->description,
            'permissions' => $PanActivity->permissions,
            'is_default' => $PanActivity->is_default,
            'created_at' => $PanActivity->created_at,
            'updated_at' => $PanActivity->updated_at
        ];
    }
}
