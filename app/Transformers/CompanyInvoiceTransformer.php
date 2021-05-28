<?php

namespace App\Transformers;

use App\Models\CompanyInvoice;
use League\Fractal\TransformerAbstract;

class CompanyInvoiceTransformer extends TransformerAbstract
{
    public function transform(CompanyInvoice $CompanyInvoice)
    {
        return [
            'id' => $CompanyInvoice->id,
            'name' => $CompanyInvoice->name,
            'description' => $CompanyInvoice->description,
            'permissions' => $CompanyInvoice->permissions,
            'is_default' => $CompanyInvoice->is_default,
            'created_at' => $CompanyInvoice->created_at,
            'updated_at' => $CompanyInvoice->updated_at
        ];
    }
}
