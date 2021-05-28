<?php

namespace App\Transformers;

use App\Models\Wallboard;
use League\Fractal\TransformerAbstract;

class WallboardTransformer extends TransformerAbstract
{
    public function transform(Wallboard $Wallboard)
    {
        return [
            'id' => $Wallboard->id,
            'name' => $Wallboard->name,
            'role' => $Wallboard->role,
        ];
    }
}
