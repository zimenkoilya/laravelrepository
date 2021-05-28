<?php

namespace App\Transformers;

use App\Models\Workboard;
use League\Fractal\TransformerAbstract;

class WorkboardTransformer extends TransformerAbstract
{
    public function transform(Workboard $workboard)
    {
        return [
            'id' => $Workboard->id,
            'name' => $Workboard->name,
            'role' => $Workboard->role,
        ];
    }
}
