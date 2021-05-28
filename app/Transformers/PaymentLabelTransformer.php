<?php

namespace App\Transformers;

use App\Models\PaymentLabel;
use League\Fractal\TransformerAbstract;

class PaymentLabelTransformer extends TransformerAbstract
{
    public function transform(PaymentLabel $PaymentLabel)
    {
        return [
            'id' => $PaymentLabel->id,
            'name' => $PaymentLabel->name,
            'description' => $PaymentLabel->description,
            'permissions' => $PaymentLabel->permissions,
            'is_default' => $PaymentLabel->is_default,
            'created_at' => $PaymentLabel->created_at,
            'updated_at' => $PaymentLabel->updated_at
        ];
    }
}
