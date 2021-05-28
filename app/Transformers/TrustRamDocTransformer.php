<?php

namespace App\Transformers;

use App\Models\TrustRamDoc;
use League\Fractal\TransformerAbstract;

class TrustRamDocTransformer extends TransformerAbstract
{
    public function transform(TrustRamDoc $TrustRamDoc)
    {
        return [
            'id' => $TrustRamDoc->id,
            'name' => $TrustRamDoc->name,
            'role' => $TrustRamDoc->role,
        ];
    }
}
