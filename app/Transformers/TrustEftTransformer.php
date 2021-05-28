<?php

namespace App\Transformers;

use App\Models\TrustEft;
use League\Fractal\TransformerAbstract;

class TrustEftTransformer extends TransformerAbstract
{
    public function transform(TrustEft $TrustEft)
    {
        return [
            'id' => $TrustEft->id,
            'name' => $TrustEft->name,
            'role' => $TrustEft->role,
        ];
    }
}
