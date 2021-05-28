<?php

namespace App\Transformers;

use App\Models\Payment;
use League\Fractal\TransformerAbstract;

class PaymentTransformer extends TransformerAbstract
{
    public function transform(Payment $Payment)
    {
        return [
            'id' => $Payment->id,
            'name' => $Payment->name,
            'description' => $Payment->description,
            'permissions' => $Payment->permissions,
            'is_default' => $Payment->is_default,
            'created_at' => $Payment->created_at,
            'updated_at' => $Payment->updated_at
        ];
    }
}
