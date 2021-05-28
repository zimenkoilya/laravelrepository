<?php

namespace App\Transformers;

use App\Models\PanConfirm;
use League\Fractal\TransformerAbstract;

class PanConfirmTransformer extends TransformerAbstract
{
    public function transform(PanConfirm $PanConfirm)
    {
        return [
            'id' => $PanConfirm->id,
            'name' => $PanConfirm->name,
            'description' => $PanConfirm->description,
            'permissions' => $PanConfirm->permissions,
            'is_default' => $PanConfirm->is_default,
            'created_at' => $PanConfirm->created_at,
            'updated_at' => $PanConfirm->updated_at
        ];
    }
}
