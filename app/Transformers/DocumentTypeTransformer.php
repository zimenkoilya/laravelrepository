<?php

namespace App\Transformers;

use App\Models\DocumentType;
use League\Fractal\TransformerAbstract;

class DocumentTypeTransformer extends TransformerAbstract
{
    public function transform(DocumentType $DocumentType)
    {
        return [
            'id' => $DocumentType->id,
            'name' => $DocumentType->name,
            'description' => $DocumentType->description,
            'permissions' => $DocumentType->permissions,
            'is_default' => $DocumentType->is_default,
            'created_at' => $DocumentType->created_at,
            'updated_at' => $DocumentType->updated_at
        ];
    }
}
