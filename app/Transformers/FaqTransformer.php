<?php

namespace App\Transformers;

use App\Models\Faq;
use League\Fractal\TransformerAbstract;

class FaqTransformer extends TransformerAbstract
{
    public function transform(Faq $Faq)
    {
        return [
            'id' => $Faq->id,
            'name' => $Faq->name,
            'description' => $Faq->description,
            'permissions' => $Faq->permissions,
            'is_default' => $Faq->is_default,
            'created_at' => $Faq->created_at,
            'updated_at' => $Faq->updated_at
        ];
    }
}
