<?php

namespace App\Transformers;

use App\Models\TrustTransactionType;
use League\Fractal\TransformerAbstract;

class TrustTransactionTypeTransformer extends TransformerAbstract
{
    public function transform(TrustTransactionType $TrustTransactionType)
    {
        return [
            'id' => $TrustTransactionType->id,
            'name' => $TrustTransactionType->name,
            'role' => $TrustTransactionType->role,
        ];
    }
}
