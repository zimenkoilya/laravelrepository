<?php

namespace App\Transformers;

use App\Models\TrustTransaction;
use League\Fractal\TransformerAbstract;

class TrustTransactionTransformer extends TransformerAbstract
{
    public function transform(TrustTransaction $TrustTransaction)
    {
        return [
            'id' => $TrustTransaction->id,
            'name' => $TrustTransaction->name,
            'role' => $TrustTransaction->role,
        ];
    }
}
