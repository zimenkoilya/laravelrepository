<?php

namespace App\Transformers;

use App\Models\DocumentField;
use League\Fractal\TransformerAbstract;

class DocumentFieldTransformer extends TransformerAbstract
{
    public function transform(DocumentField $DocumentField)
    {
        return [
            'id' => $DocumentField->id,
            'name' => $DocumentField->name,
            'description' => $DocumentField->description,
            'permissions' => $DocumentField->permissions,
            'is_default' => $DocumentField->is_default,
            'created_at' => $DocumentField->created_at,
            'updated_at' => $DocumentField->updated_at
        ];
    }
}
