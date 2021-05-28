<?php

namespace App\Transformers;

use App\Models\EmailOpen;
use League\Fractal\TransformerAbstract;

class EmailOpenTransformer extends TransformerAbstract
{
    public function transform(EmailOpen $EmailOpen)
    {
        return [
            'id' => $EmailOpen->id,
            'name' => $EmailOpen->name,
            'description' => $EmailOpen->description,
            'permissions' => $EmailOpen->permissions,
            'is_default' => $EmailOpen->is_default,
            'created_at' => $EmailOpen->created_at,
            'updated_at' => $EmailOpen->updated_at
        ];
    }
}
