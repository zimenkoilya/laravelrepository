<?php

namespace App\Transformers;

use App\Models\WalletInvoice;
use League\Fractal\TransformerAbstract;

class WalletInvoiceTransformer extends TransformerAbstract
{
    public function transform(WalletInvoice $WalletInvoice)
    {
        return [
            'id' => $WalletInvoice->id,
            'name' => $WalletInvoice->name,
            'role' => $WalletInvoice->role,
        ];
    }
}
