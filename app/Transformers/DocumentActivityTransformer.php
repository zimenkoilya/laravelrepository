<?php

namespace App\Transformers;

use App\Models\DocumentActivity;
use League\Fractal\TransformerAbstract;

class DocumentActivityTransformer extends TransformerAbstract
{
    public function transform(DocumentActivity $DocumentActivity)
    {
        return [
            'id' => $DocumentActivity->id,
            'name' => $DocumentActivity->name,
            'description' => $DocumentActivity->description,
            'permissions' => $DocumentActivity->permissions,
            'is_default' => $DocumentActivity->is_default,
            'created_at' => $DocumentActivity->created_at,
            'updated_at' => $DocumentActivity->updated_at
        ];
    }
}
