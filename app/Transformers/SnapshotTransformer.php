<?php

namespace App\Transformers;

use App\Models\StatusExpiration;
use League\Fractal\TransformerAbstract;

class StatusExpirationTransformer extends TransformerAbstract
{
    public function transform(StatusExpiration $StatusExpiration)
    {
        return [
            'company_id' => $StatusExpiration->company_id,
            'name' => $StatusExpiration->name,
            'body' => $StatusExpiration->body,
            'updated' => $StatusExpiration->updated,
            'updated_by' => $StatusExpiration->updated_by,
            'window_size' => $StatusExpiration->window_size,
            'template_id' => $StatusExpiration->template_id,
            'active' => $StatusExpiration->active,
        ];
    }
}
