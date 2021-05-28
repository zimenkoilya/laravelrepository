<?php

namespace App\Transformers;

use App\Models\NoteType;
use League\Fractal\TransformerAbstract;

class NoteTypeTransformer extends TransformerAbstract
{
    public function transform(NoteType $NoteType)
    {
        return [
            'id' => $NoteType->id,
            'name' => $NoteType->name,
            'description' => $NoteType->description,
            'permissions' => $NoteType->permissions,
            'is_default' => $NoteType->is_default,
            'created_at' => $NoteType->created_at,
            'updated_at' => $NoteType->updated_at
        ];
    }
}
