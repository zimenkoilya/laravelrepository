<?php

namespace App\Transformers;

use App\Models\CompanyPayment;
use League\Fractal\TransformerAbstract;

class CompanyPaymentTransformer extends TransformerAbstract
{
    public function transform(CompanyPayment $CompanyPayment)
    {
        return [
            'id' => $CompanyPayment->id,
            'name' => $CompanyPayment->name,
            'description' => $CompanyPayment->description,
            'permissions' => $CompanyPayment->permissions,
            'is_default' => $CompanyPayment->is_default,
            'created_at' => $CompanyPayment->created_at,
            'updated_at' => $CompanyPayment->updated_at
        ];
    }
}
