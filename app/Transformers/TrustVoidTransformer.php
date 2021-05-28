<?php

namespace App\Transformers;

use App\Models\TrustVoid;
use League\Fractal\TransformerAbstract;

class TrustVoidTransformer extends TransformerAbstract
{
    public function transform(TrustVoid $TrustVoid)
    {
        return [
            'id' => $TrustVoid->id,
            'name' => $TrustVoid->name,
            'role' => $TrustVoid->role,
        ];
    }
}
