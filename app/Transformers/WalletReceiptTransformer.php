<?php

namespace App\Transformers;

use App\Models\WalletReceipt;
use League\Fractal\TransformerAbstract;

class WalletReceiptTransformer extends TransformerAbstract
{
    public function transform(WalletReceipt $WalletReceipt)
    {
        return [
            'id' => $WalletReceipt->id,
            'name' => $WalletReceipt->name,
            'role' => $WalletReceipt->role,
        ];
    }
}
