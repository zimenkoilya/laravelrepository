<?php

namespace App\Transformers;

use App\Models\StatusType;
use League\Fractal\TransformerAbstract;

class StatusTypeTransformer extends TransformerAbstract
{
    public function transform(StatusType $StatusType)
    {
        return [
            'id' => $StatusType->id,
            'name' => $StatusType->name,
            'data_template' => $StatusType->data_template,
            'type' => $StatusType->type,
            'url' => $StatusType->url,
            'active' => $StatusType->active,
            'created_at' => $StatusType->created_at,
            'updated_at' => $StatusType->updated_at,
        ];
    }
}
