<?php

namespace App\Transformers;

use App\Models\InvoiceLabel;
use League\Fractal\TransformerAbstract;

class InvoiceLabelTransformer extends TransformerAbstract
{
    public function transform(InvoiceLabel $InvoiceLabel)
    {
        return [
            'id' => $InvoiceLabel->id,
            'name' => $InvoiceLabel->name,
            'description' => $InvoiceLabel->description,
            'permissions' => $InvoiceLabel->permissions,
            'is_default' => $InvoiceLabel->is_default,
            'created_at' => $InvoiceLabel->created_at,
            'updated_at' => $InvoiceLabel->updated_at
        ];
    }
}
