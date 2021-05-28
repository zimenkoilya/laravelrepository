<?php

namespace App\Transformers;

use App\Models\StatusExpiration;
use League\Fractal\TransformerAbstract;

class StatusExpirationTransformer extends TransformerAbstract
{
    public function transform(StatusExpiration $StatusExpiration)
    {
        return [
            'id' => $StatusExpiration->id,
            'name' => $StatusExpiration->name,
            'data_template' => $StatusExpiration->data_template,
            'type' => $StatusExpiration->type,
            'url' => $StatusExpiration->url,
            'active' => $StatusExpiration->active,
            'created_at' => $StatusExpiration->created_at,
            'updated_at' => $StatusExpiration->updated_at,
        ];
    }
}
