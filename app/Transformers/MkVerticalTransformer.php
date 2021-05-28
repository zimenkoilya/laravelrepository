<?php

namespace App\Transformers;

use App\Models\MkVertical;
use League\Fractal\TransformerAbstract;

class MkVerticalTransformer extends TransformerAbstract
{
    public function transform(MkVertical $MkVertical)
    {
        return [
            'id' => $MkVertical->id,
            'name' => $MkVertical->name,
            'description' => $MkVertical->description,
            'permissions' => $MkVertical->permissions,
            'is_default' => $MkVertical->is_default,
            'created_at' => $MkVertical->created_at,
            'updated_at' => $MkVertical->updated_at
        ];
    }
}
