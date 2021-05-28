<?php

namespace App\Transformers;

use App\Models\PaymentLog;
use League\Fractal\TransformerAbstract;

class PaymentLogTransformer extends TransformerAbstract
{
    public function transform(PaymentLog $PaymentLog)
    {
        return [
            'id' => $PaymentLog->id,
            'name' => $PaymentLog->name,
            'description' => $PaymentLog->description,
            'permissions' => $PaymentLog->permissions,
            'is_default' => $PaymentLog->is_default,
            'created_at' => $PaymentLog->created_at,
            'updated_at' => $PaymentLog->updated_at
        ];
    }
}
