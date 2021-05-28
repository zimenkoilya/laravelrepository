<?php

namespace App\Transformers;

use App\Models\Scheme;
use League\Fractal\TransformerAbstract;

class SchemeTransformer extends TransformerAbstract
{
    public function transform(Scheme $scheme)
    {
        return [
            'id' => $scheme->id,
            'name' => $scheme->name,
            'context' => $scheme->context,
            'conditions' => $scheme->conditions,
            'content' => $scheme->content,
        ];
    }
}
