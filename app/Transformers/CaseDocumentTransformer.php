<?php

namespace App\Transformers;

use App\Models\CaseDocument;
use League\Fractal\TransformerAbstract;

class CaseDocumentTransformer extends TransformerAbstract
{
    public function transform(CaseDocument $CaseDocument)
    {
        return [
            'id' => $CaseDocument->id,
            'name' => $CaseDocument->name,
            'description' => $CaseDocument->description,
            'permissions' => $CaseDocument->permissions,
            'is_default' => $CaseDocument->is_default,
            'created_at' => $CaseDocument->created_at,
            'updated_at' => $CaseDocument->updated_at
        ];
    }
}
