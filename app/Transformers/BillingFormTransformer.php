<?php

namespace App\Transformers;

use App\Models\BillingForm;
use League\Fractal\TransformerAbstract;

class BillingFormTransformer extends TransformerAbstract
{
    public function transform(BillingForm $billingForm)
    {
        return [
            'id' => $billingForm->id,
            'cases' => $billingForm->cases,
            'billing_type' => $billingForm->billing_type,
            'send_type' => $billingForm->send_type,
            'phone' => $billingForm->phone,
            'email' => $billingForm->email,
            'uuid' => $billingForm->uuid,
            'token' => $billingForm->token,
            'expired' => $billingForm->expired,
            'created_at' => $billingForm->created_at,
            'updated_at' => $billingForm->updated_at,
        ];
    }
}
