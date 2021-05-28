<?php

namespace App\Transformers;

use App\Models\KbPostContent;
use League\Fractal\TransformerAbstract;

class KbPostContentTransformer extends TransformerAbstract
{
    public function transform(KbPostContent $KbPostContent)
    {
        return [
            'id' => $KbPostContent->id,
            'name' => $KbPostContent->name,
            'description' => $KbPostContent->description,
            'permissions' => $KbPostContent->permissions,
            'is_default' => $KbPostContent->is_default,
            'created_at' => $KbPostContent->created_at,
            'updated_at' => $KbPostContent->updated_at
        ];
    }
}
