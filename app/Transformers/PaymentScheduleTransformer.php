<?php

namespace App\Transformers;

use App\Models\PaymentSchedule;
use League\Fractal\TransformerAbstract;

class PaymentScheduleTransformer extends TransformerAbstract
{
    public function transform(PaymentSchedule $PaymentSchedule)
    {
        return [
            'id' => $PaymentSchedule->id,
            'name' => $PaymentSchedule->name,
            'description' => $PaymentSchedule->description,
            'permissions' => $PaymentSchedule->permissions,
            'is_default' => $PaymentSchedule->is_default,
            'created_at' => $PaymentSchedule->created_at,
            'updated_at' => $PaymentSchedule->updated_at
        ];
    }
}
