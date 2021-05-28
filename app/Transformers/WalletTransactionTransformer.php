<?php

namespace App\Transformers;

use App\Models\WalletTransaction;
use League\Fractal\TransformerAbstract;

class WalletTransactionTransformer extends TransformerAbstract
{
    public function transform(WalletTransaction $WalletTransaction)
    {
        return [
            'id' => $WalletTransaction->id,
            'name' => $WalletTransaction->name,
            'role' => $WalletTransaction->role,
        ];
    }
}
