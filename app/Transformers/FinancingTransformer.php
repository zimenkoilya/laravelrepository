<?php

namespace App\Transformers;

use App\Models\Financing;
use League\Fractal\TransformerAbstract;

class FinancingTransformer extends TransformerAbstract
{
    public function transform(Financing $Financing)
    {
        return [
            'id' => $Financing->id,
            'name' => $Financing->name,
            'description' => $Financing->description,
            'permissions' => $Financing->permissions,
            'is_default' => $Financing->is_default,
            'created_at' => $Financing->created_at,
            'updated_at' => $Financing->updated_at
        ];
    }
}
