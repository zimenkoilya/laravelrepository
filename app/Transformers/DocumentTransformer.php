<?php

namespace App\Transformers;

use App\Models\Document;
use League\Fractal\TransformerAbstract;

class DocumentTransformer extends TransformerAbstract
{
    public function transform(Document $Document)
    {
        return [
            'id' => $Document->id,
            'name' => $Document->name,
            'description' => $Document->description,
            'permissions' => $Document->permissions,
            'is_default' => $Document->is_default,
            'created_at' => $Document->created_at,
            'updated_at' => $Document->updated_at
        ];
    }
}
