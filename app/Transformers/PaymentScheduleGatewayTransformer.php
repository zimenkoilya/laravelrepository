<?php

namespace App\Transformers;

use App\Models\PaymentScheduleGateway;
use League\Fractal\TransformerAbstract;

class PaymentScheduleGatewayTransformer extends TransformerAbstract
{
    public function transform(PaymentScheduleGateway $PaymentScheduleGateway)
    {
        return [
            'id' => $PaymentScheduleGateway->id,
            'name' => $PaymentScheduleGateway->name,
            'description' => $PaymentScheduleGateway->description,
            'permissions' => $PaymentScheduleGateway->permissions,
            'is_default' => $PaymentScheduleGateway->is_default,
            'created_at' => $PaymentScheduleGateway->created_at,
            'updated_at' => $PaymentScheduleGateway->updated_at
        ];
    }
}
