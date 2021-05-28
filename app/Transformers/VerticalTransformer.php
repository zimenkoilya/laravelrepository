<?php

namespace App\Transformers;

use App\Models\Vertical;
use League\Fractal\TransformerAbstract;

class VerticalTransformer extends TransformerAbstract
{
    public function transform(Vertical $Vertical)
    {
        return [
            'id' => $Vertical->id,
            'name' => $Vertical->name,
            'role' => $Vertical->role,
        ];
    }
}
