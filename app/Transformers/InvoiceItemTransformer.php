<?php

namespace App\Transformers;

use App\Models\InvoiceItem;
use League\Fractal\TransformerAbstract;

class InvoiceItemTransformer extends TransformerAbstract
{
    public function transform(InvoiceItem $InvoiceItem)
    {
        return [
            'id' => $InvoiceItem->id,
            'name' => $InvoiceItem->name,
            'description' => $InvoiceItem->description,
            'permissions' => $InvoiceItem->permissions,
            'is_default' => $InvoiceItem->is_default,
            'created_at' => $InvoiceItem->created_at,
            'updated_at' => $InvoiceItem->updated_at
        ];
    }
}
