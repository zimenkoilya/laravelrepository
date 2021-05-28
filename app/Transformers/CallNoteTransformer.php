<?php

namespace App\Transformers;

use App\Models\CallNote;
use League\Fractal\TransformerAbstract;

class CallNoteTransformer extends TransformerAbstract
{
    public function transform(CallNote $CallNote)
    {
        return [
            'id' => $CallNote->id,
            'name' => $CallNote->name,
            'description' => $CallNote->description,
            'permissions' => $CallNote->permissions,
            'is_default' => $CallNote->is_default,
            'created_at' => $CallNote->created_at,
            'updated_at' => $CallNote->updated_at
        ];
    }
}
