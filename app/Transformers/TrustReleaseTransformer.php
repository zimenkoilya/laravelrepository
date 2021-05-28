<?php

namespace App\Transformers;

use App\Models\TrustRelease;
use League\Fractal\TransformerAbstract;

class TrustReleaseTransformer extends TransformerAbstract
{
    public function transform(TrustRelease $TrustRelease)
    {
        return [
            'id' => $TrustRelease->id,
            'name' => $TrustRelease->name,
            'role' => $TrustRelease->role,
        ];
    }
}
