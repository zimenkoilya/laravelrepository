<?php

namespace App\Transformers;

use App\Models\TrustFeeList;
use League\Fractal\TransformerAbstract;

class TrustFeeListTransformer extends TransformerAbstract
{
    public function transform(TrustFeeList $TrustFeeList)
    {
        return [
            'id' => $TrustFeeList->id,
            'name' => $TrustFeeList->name,
            'role' => $TrustFeeList->role,
        ];
    }
}
