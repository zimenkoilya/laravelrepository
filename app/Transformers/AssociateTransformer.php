<?php

namespace App\Transformers;

use App\Models\Associate;
use League\Fractal\TransformerAbstract;

class AssociateTransformer extends TransformerAbstract
{
    public function transform(Associate $associate)
    {
        return [
            'id' => $associate->id,
            'name' => $associate->name,
            'created_at' => $associate->created_at,
            'updated_at' => $associate->updated_at,
        ];
    }
}
