<?php

namespace App\Transformers;

use App\Models\CreditrepairDispute;
use League\Fractal\TransformerAbstract;

class CreditrepairDisputeTransformer extends TransformerAbstract
{
    public function transform(CreditrepairDispute $CreditrepairDispute)
    {
        return [
            'id' => $CreditrepairDispute->id,
            'name' => $CreditrepairDispute->name,
            'description' => $CreditrepairDispute->description,
            'permissions' => $CreditrepairDispute->permissions,
            'is_default' => $CreditrepairDispute->is_default,
            'created_at' => $CreditrepairDispute->created_at,
            'updated_at' => $CreditrepairDispute->updated_at
        ];
    }
}
