<?php

namespace App\Transformers;

use App\Models\TrustAccount;
use League\Fractal\TransformerAbstract;

class TrustAccountTransformer extends TransformerAbstract
{
    public function transform(TrustAccount $TrustAccount)
    {
        return [
            'id' => $TrustAccount->id,
            'name' => $TrustAccount->name,
            'role' => $TrustAccount->role,
        ];
    }
}
