<?php

namespace App\Transformers;

use App\Models\WalletCard;
use League\Fractal\TransformerAbstract;

class WalletCardTransformer extends TransformerAbstract
{
    public function transform(WalletCard $WalletCard)
    {
        return [
            'id' => $WalletCard->id,
            'name' => $WalletCard->name,
            'role' => $WalletCard->role,
        ];
    }
}
