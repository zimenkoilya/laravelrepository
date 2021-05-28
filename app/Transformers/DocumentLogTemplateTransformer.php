<?php

namespace App\Transformers;

use App\Models\DocumentLog;
use League\Fractal\TransformerAbstract;

class DocumentLogTransformer extends TransformerAbstract
{
    public function transform(DocumentLog $DocumentLog)
    {
        return [
            'id' => $DocumentLog->id,
            'name' => $DocumentLog->name,
            'description' => $DocumentLog->description,
            'permissions' => $DocumentLog->permissions,
            'is_default' => $DocumentLog->is_default,
            'created_at' => $DocumentLog->created_at,
            'updated_at' => $DocumentLog->updated_at
        ];
    }
}
