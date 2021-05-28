<?php

namespace App\Transformers;

use App\Models\Wallet;
use League\Fractal\TransformerAbstract;

class WalletTransformer extends TransformerAbstract
{
    public function transform(Wallet $Wallet)
    {
        return [
            'id' => $Wallet->id,
            'name' => $Wallet->name,
            'role' => $Wallet->role,
        ];
    }
}
