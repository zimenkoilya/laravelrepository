<?php

namespace App\Transformers;

use App\Models\CompanyBilling;
use League\Fractal\TransformerAbstract;

class CompanyBillingTransformer extends TransformerAbstract
{
    public function transform(CompanyBilling $CompanyBilling)
    {
        return [
            'id' => $CompanyBilling->id,
            'name' => $CompanyBilling->name,
            'description' => $CompanyBilling->description,
            'permissions' => $CompanyBilling->permissions,
            'is_default' => $CompanyBilling->is_default,
            'created_at' => $CompanyBilling->created_at,
            'updated_at' => $CompanyBilling->updated_at
        ];
    }
}
