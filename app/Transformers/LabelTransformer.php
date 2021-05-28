<?php

namespace App\Transformers;

use App\Models\Label;
use League\Fractal\TransformerAbstract;

class LabelTransformer extends TransformerAbstract
{
    public function transform(Label $Label)
    {
        return [
            'id' => $Label->id,
            'name' => $Label->name,
            'description' => $Label->description,
            'permissions' => $Label->permissions,
            'is_default' => $Label->is_default,
            'created_at' => $Label->created_at,
            'updated_at' => $Label->updated_at
        ];
    }
}
