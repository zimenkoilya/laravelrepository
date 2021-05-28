<?php

namespace App\Transformers;

use App\Models\Bulletin;
use League\Fractal\TransformerAbstract;

class BulletinTransformer extends TransformerAbstract
{
    public function transform(Bulletin $bulletin)
    {
        return [
            'id' => $bulletin->id,
            'counts' => $bulletin->counts,
            'status' => $bulletin->status,
            'last_contacted_at' => $bulletin->last_contacted_at,
            'status_updated_at' => $bulletin->status_updated_at,
        ];
    }
}
