<?php

namespace App\Transformers;

use App\Models\DocumentGroup;
use League\Fractal\TransformerAbstract;

class DocumentGroupTransformer extends TransformerAbstract
{
    public function transform(DocumentGroup $DocumentGroup)
    {
        return [
            'id' => $DocumentGroup->id,
            'name' => $DocumentGroup->name,
            'description' => $DocumentGroup->description,
            'permissions' => $DocumentGroup->permissions,
            'is_default' => $DocumentGroup->is_default,
            'created_at' => $DocumentGroup->created_at,
            'updated_at' => $DocumentGroup->updated_at
        ];
    }
}
