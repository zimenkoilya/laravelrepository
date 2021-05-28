<?php

namespace App\Transformers;

use App\Models\InvoiceType;
use League\Fractal\TransformerAbstract;

class InvoiceTypeTransformer extends TransformerAbstract
{
    public function transform(InvoiceType $InvoiceType)
    {
        return [
            'id' => $InvoiceType->id,
            'name' => $InvoiceType->name,
            'description' => $InvoiceType->description,
            'permissions' => $InvoiceType->permissions,
            'is_default' => $InvoiceType->is_default,
            'created_at' => $InvoiceType->created_at,
            'updated_at' => $InvoiceType->updated_at
        ];
    }
}
