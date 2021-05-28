<?php

namespace App\Transformers;

use App\Models\TrustProgramTransaction;
use League\Fractal\TransformerAbstract;

class TrustProgramTransactionTransformer extends TransformerAbstract
{
    public function transform(TrustProgramTransaction $TrustProgramTransaction)
    {
        return [
            'id' => $TrustProgramTransaction->id,
            'name' => $TrustProgramTransaction->name,
            'role' => $TrustProgramTransaction->role,
        ];
    }
}
