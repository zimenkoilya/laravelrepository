<?php

namespace App\Transformers;

use App\Models\Summary;
use League\Fractal\TransformerAbstract;

class SummaryTransformer extends TransformerAbstract
{
    public function transform(Summary $Summary)
    {
        return [
            'id' => $Summary->id,
            'name' => $Summary->name,
            'data_template' => $Summary->data_template,
            'type' => $Summary->type,
            'url' => $Summary->url,
            'active' => $Summary->active,
            'created_at' => $Summary->created_at,
            'updated_at' => $Summary->updated_at,
        ];
    }
}
