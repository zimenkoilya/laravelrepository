<?php

namespace App\Transformers;

use App\Models\StatusGroup;
use League\Fractal\TransformerAbstract;

class StatusGroupTransformer extends TransformerAbstract
{
    public function transform(StatusGroup $StatusGroup)
    {
        return [
            'id' => $StatusGroup->id,
            'name' => $StatusGroup->name,
            'data_template' => $StatusGroup->data_template,
            'type' => $StatusGroup->type,
            'url' => $StatusGroup->url,
            'active' => $StatusGroup->active,
            'created_at' => $StatusGroup->created_at,
            'updated_at' => $StatusGroup->updated_at,
        ];
    }
}
