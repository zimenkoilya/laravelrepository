<?php

namespace App\Transformers;

use App\Models\CaseNote;
use League\Fractal\TransformerAbstract;

class CaseNoteTransformer extends TransformerAbstract
{
    public function transform(CaseNote $CaseNote)
    {
        return [
            'id' => $CaseNote->id,
            'name' => $CaseNote->name,
            'description' => $CaseNote->description,
            'permissions' => $CaseNote->permissions,
            'is_default' => $CaseNote->is_default,
            'created_at' => $CaseNote->created_at,
            'updated_at' => $CaseNote->updated_at
        ];
    }
}
