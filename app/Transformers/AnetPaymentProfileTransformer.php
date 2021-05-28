<?php

namespace App\Transformers;

use App\Models\AnetPaymentProfile;
use League\Fractal\TransformerAbstract;

class AnetPaymentProfileTransformer extends TransformerAbstract
{
    public function transform(AnetPaymentProfile $anetPaymentProfile)
    {
        return [
            'id' => $anetPaymentProfile->id,
            'created_at' => $anetPaymentProfile->created_at,
            'updated_at' => $anetPaymentProfile->updated_at,
        ];
    }
}
