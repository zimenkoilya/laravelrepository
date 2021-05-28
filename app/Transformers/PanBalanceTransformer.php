<?php

namespace App\Transformers;

use App\Models\PanBalance;
use League\Fractal\TransformerAbstract;

class PanBalanceTransformer extends TransformerAbstract
{
    public function transform(PanBalance $PanBalance)
    {
        return [
            'id' => $PanBalance->id,
            'name' => $PanBalance->name,
            'description' => $PanBalance->description,
            'permissions' => $PanBalance->permissions,
            'is_default' => $PanBalance->is_default,
            'created_at' => $PanBalance->created_at,
            'updated_at' => $PanBalance->updated_at
        ];
    }
}
