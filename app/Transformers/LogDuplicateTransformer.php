<?php

namespace App\Transformers;

use App\Models\LogDuplicate;
use League\Fractal\TransformerAbstract;

class LogDuplicateTransformer extends TransformerAbstract
{
    public function transform(LogDuplicate $LogDuplicate)
    {
        return [
            'id' => $LogDuplicate->id,
            'name' => $LogDuplicate->name,
            'description' => $LogDuplicate->description,
            'permissions' => $LogDuplicate->permissions,
            'is_default' => $LogDuplicate->is_default,
            'created_at' => $LogDuplicate->created_at,
            'updated_at' => $LogDuplicate->updated_at
        ];
    }
}
