<?php

namespace App\Transformers;

use App\Models\BillingType;
use League\Fractal\TransformerAbstract;

class BillingTypeTransformer extends TransformerAbstract
{
    public function transform(BillingType $billingType)
    {
        return [
            'id' => $billingType->id,
            'name' => $billingType->name
        ];
    }
}
