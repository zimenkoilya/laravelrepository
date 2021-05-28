<?php

namespace App\Transformers;

use App\Models\BillingVerify;
use League\Fractal\TransformerAbstract;

class BillingVerifyTransformer extends TransformerAbstract
{
    public function transform(BillingVerify $billingVerify)
    {
        return [
            'id' => $billingVerify->id,
            'reference_id' => $billingVerify->reference_id,
            'service' => $billingVerify->service,
            'response' => $billingVerify->response,
            'code' => $billingVerify->code,
            'created_at' => $billingVerify->created_at,
            'updated_at' => $billingVerify->updated_at,
        ];
    }
}
