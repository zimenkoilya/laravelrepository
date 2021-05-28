<?php

namespace App\Transformers;

use App\Models\AnetCustomerProfile;
use League\Fractal\TransformerAbstract;

class AnetCustomerProfileTransformer extends TransformerAbstract
{
    public function transform(AnetCustomerProfile $anetCustomerProfile)
    {
        return [
            'id' => $anetCustomerProfile->id,
            'created_at' => $anetCustomerProfile->created_at,
            'updated_at' => $anetCustomerProfile->updated_at,
        ];
    }
}
