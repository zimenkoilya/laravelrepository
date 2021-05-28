<?php

namespace App\Transformers;

use App\Models\LogActivity;
use League\Fractal\TransformerAbstract;

class LogActivityTransformer extends TransformerAbstract
{
    public function transform(LogActivity $LogActivity)
    {
        return [
            'id' => $LogActivity->id,
            'name' => $LogActivity->name,
            'description' => $LogActivity->description,
            'permissions' => $LogActivity->permissions,
            'is_default' => $LogActivity->is_default,
            'created_at' => $LogActivity->created_at,
            'updated_at' => $LogActivity->updated_at
        ];
    }
}
