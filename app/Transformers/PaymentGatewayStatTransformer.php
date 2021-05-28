<?php

namespace App\Transformers;

use App\Models\PaymentGatewayStat;
use League\Fractal\TransformerAbstract;

class PaymentGatewayStatTransformer extends TransformerAbstract
{
    public function transform(PaymentGatewayStat $PaymentGatewayStat)
    {
        return [
            'id' => $PaymentGatewayStat->id,
            'name' => $PaymentGatewayStat->name,
            'description' => $PaymentGatewayStat->description,
            'permissions' => $PaymentGatewayStat->permissions,
            'is_default' => $PaymentGatewayStat->is_default,
            'created_at' => $PaymentGatewayStat->created_at,
            'updated_at' => $PaymentGatewayStat->updated_at
        ];
    }
}
