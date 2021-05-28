<?php

namespace App\Transformers;

use App\Models\KbComment;
use League\Fractal\TransformerAbstract;

class KbCommentTransformer extends TransformerAbstract
{
    public function transform(KbComment $KbComment)
    {
        return [
            'id' => $KbComment->id,
            'name' => $KbComment->name,
            'description' => $KbComment->description,
            'permissions' => $KbComment->permissions,
            'is_default' => $KbComment->is_default,
            'created_at' => $KbComment->created_at,
            'updated_at' => $KbComment->updated_at
        ];
    }
}
