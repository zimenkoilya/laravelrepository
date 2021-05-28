<?php

namespace App\Transformers;

use App\Models\PaymentScheduleType;
use League\Fractal\TransformerAbstract;

class PaymentScheduleTypeTransformer extends TransformerAbstract
{
    public function transform(PaymentScheduleType $paymentScheduleType)
    {
        return [
            'id' => $paymentScheduleType->id,
            'name' => $paymentScheduleType->name,
            'clean_name' => $paymentScheduleType->clean_name
        ];
    }
}
