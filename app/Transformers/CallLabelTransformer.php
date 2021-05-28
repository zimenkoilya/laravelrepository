<?php

namespace App\Transformers;

use App\Models\CallLabel;
use League\Fractal\TransformerAbstract;

class CallLabelTransformer extends TransformerAbstract
{
    public function transform(CallLabel $CallLabel)
    {
        return [
            'id' => $CallLabel->id,
            'name' => $CallLabel->name,
            'description' => $CallLabel->description,
            'permissions' => $CallLabel->permissions,
            'is_default' => $CallLabel->is_default,
            'created_at' => $CallLabel->created_at,
            'updated_at' => $CallLabel->updated_at
        ];
    }
}
