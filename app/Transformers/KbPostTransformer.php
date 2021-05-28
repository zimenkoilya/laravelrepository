<?php

namespace App\Transformers;

use App\Models\KbPost;
use League\Fractal\TransformerAbstract;

class KbPostTransformer extends TransformerAbstract
{
    public function transform(KbPost $KbPost)
    {
        return [
            'id' => $KbPost->id,
            'name' => $KbPost->name,
            'description' => $KbPost->description,
            'permissions' => $KbPost->permissions,
            'is_default' => $KbPost->is_default,
            'created_at' => $KbPost->created_at,
            'updated_at' => $KbPost->updated_at
        ];
    }
}
