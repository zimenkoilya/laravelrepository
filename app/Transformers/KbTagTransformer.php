<?php

namespace App\Transformers;

use App\Models\KbTag;
use League\Fractal\TransformerAbstract;

class KbTagTransformer extends TransformerAbstract
{
    public function transform(KbTag $KbTag)
    {
        return [
            'id' => $KbTag->id,
            'name' => $KbTag->name,
            'description' => $KbTag->description,
            'permissions' => $KbTag->permissions,
            'is_default' => $KbTag->is_default,
            'created_at' => $KbTag->created_at,
            'updated_at' => $KbTag->updated_at
        ];
    }
}
