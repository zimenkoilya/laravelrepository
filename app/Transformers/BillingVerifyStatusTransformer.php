<?php

namespace App\Transformers;

use App\Models\BillingVerifyStatus;
use League\Fractal\TransformerAbstract;

class BillingVerifyStatusTransformer extends TransformerAbstract
{
    public function transform(BillingVerifyStatus $billingVerifyStatus)
    {
        return [
            'id' => $billingVerifyStatus->id,
            'name' => $billingVerifyStatus->name
        ];
    }
}
