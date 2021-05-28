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
            'company_id' => $StatusExpiration->company_id,
            'type' => $StatusExpiration->type,
            'url' => $StatusExpiration->url,
            'active' => $StatusExpiration->active,
            'value' => $StatusExpiration->value,
            'description' => $StatusExpiration->description,
            'oauth_id' => $StatusExpiration->oauth_id,
        ];
    }
}
