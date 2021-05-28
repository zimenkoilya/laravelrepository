<?php

namespace App\Transformers;

use App\Models\KbLog;
use League\Fractal\TransformerAbstract;

class KbLogTransformer extends TransformerAbstract
{
    public function transform(KbLog $KbLog)
    {
        return [
            'id' => $KbLog->id,
            'name' => $KbLog->name,
            'description' => $KbLog->description,
            'permissions' => $KbLog->permissions,
            'is_default' => $KbLog->is_default,
            'created_at' => $KbLog->created_at,
            'updated_at' => $KbLog->updated_at
        ];
    }
}
