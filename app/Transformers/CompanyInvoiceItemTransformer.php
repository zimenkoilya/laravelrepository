<?php

namespace App\Transformers;

use App\Models\CompanyInvoiceItem;
use League\Fractal\TransformerAbstract;

class CompanyInvoiceItemTransformer extends TransformerAbstract
{
    public function transform(CompanyInvoiceItem $CompanyInvoiceItem)
    {
        return [
            'id' => $CompanyInvoiceItem->id,
            'name' => $CompanyInvoiceItem->name,
            'description' => $CompanyInvoiceItem->description,
            'permissions' => $CompanyInvoiceItem->permissions,
            'is_default' => $CompanyInvoiceItem->is_default,
            'created_at' => $CompanyInvoiceItem->created_at,
            'updated_at' => $CompanyInvoiceItem->updated_at
        ];
    }
}
