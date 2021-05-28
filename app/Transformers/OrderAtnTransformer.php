<?php

namespace App\Transformers;

use App\Models\OrderAtn;
use League\Fractal\TransformerAbstract;

class OrderAtnTransformer extends TransformerAbstract
{
    public function transform(OrderAtn $OrderAtn)
    {
        return [
            'id' => $OrderAtn->id,
            'name' => $OrderAtn->name,
            'description' => $OrderAtn->description,
            'permissions' => $OrderAtn->permissions,
            'is_default' => $OrderAtn->is_default,
            'created_at' => $OrderAtn->created_at,
            'updated_at' => $OrderAtn->updated_at
        ];
    }
}
