<?php

namespace App\Transformers;

use App\Models\StatusLabel;
use League\Fractal\TransformerAbstract;

class StatusLabelTransformer extends TransformerAbstract
{
    public function transform(StatusLabel $StatusLabel)
    {
        return [
            'id' => $StatusLabel->id,
            'name' => $StatusLabel->name,
            'data_template' => $StatusLabel->data_template,
            'type' => $StatusLabel->type,
            'url' => $StatusLabel->url,
            'active' => $StatusLabel->active,
            'created_at' => $StatusLabel->created_at,
            'updated_at' => $StatusLabel->updated_at,
        ];
    }
}
