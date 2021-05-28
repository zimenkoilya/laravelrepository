<?php

namespace App\Transformers;

use App\Models\Invoice;
use League\Fractal\TransformerAbstract;

class InvoiceTransformer extends TransformerAbstract
{
    public function transform(Invoice $Invoice)
    {
        return [
            'id' => $Invoice->id,
            'name' => $Invoice->name,
            'description' => $Invoice->description,
            'permissions' => $Invoice->permissions,
            'is_default' => $Invoice->is_default,
            'created_at' => $Invoice->created_at,
            'updated_at' => $Invoice->updated_at
        ];
    }
}
