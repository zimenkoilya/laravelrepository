<?php

namespace App\Transformers;

use App\Models\UserFinancing;
use League\Fractal\TransformerAbstract;

class UserFinancingTransformer extends TransformerAbstract
{
    public function transform(UserFinancing $UserFinancing)
    {
        return [
            'id' => $UserFinancing->id,
            'name' => $UserFinancing->name,
            'role' => $UserFinancing->role,
        ];
    }
}
