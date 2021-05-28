<?php

namespace App\Transformers;

use App\Models\WalletItem;
use League\Fractal\TransformerAbstract;

class WalletItemTransformer extends TransformerAbstract
{
    public function transform(WalletItem $WalletItem)
    {
        return [
            'id' => $WalletItem->id,
            'name' => $WalletItem->name,
            'role' => $WalletItem->role,
        ];
    }
}
