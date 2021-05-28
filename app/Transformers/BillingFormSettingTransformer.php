<?php

namespace App\Transformers;

use App\Models\BillingFormSetting;
use League\Fractal\TransformerAbstract;

class BillingFormSettingTransformer extends TransformerAbstract
{
    public function transform(BillingFormSetting $billingFormSetting)
    {
        return [
            'id' => $billingFormSetting->id,
            'company' => $billingFormSetting->company,
            'created_at' => $billingFormSetting->created_at,
            'updated_at' => $billingFormSetting->updated_at,
        ];
    }
}
