<?php

namespace App\Transformers;

use App\Models\PaymentCommissionUser;
use League\Fractal\TransformerAbstract;

class PaymentCommissionUserTransformer extends TransformerAbstract
{
    public function transform(PaymentCommissionUser $PaymentCommissionUser)
    {
        return [
            'id' => $PaymentCommissionUser->id,
            'name' => $PaymentCommissionUser->name,
            'description' => $PaymentCommissionUser->description,
            'permissions' => $PaymentCommissionUser->permissions,
            'is_default' => $PaymentCommissionUser->is_default,
            'created_at' => $PaymentCommissionUser->created_at,
            'updated_at' => $PaymentCommissionUser->updated_at
        ];
    }
}
