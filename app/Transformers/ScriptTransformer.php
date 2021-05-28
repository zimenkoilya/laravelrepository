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
            'updated' => $StatusExpiration->updated,
            'updated_by' => $StatusExpiration->updated_by,
            'window_width' => $StatusExpiration->window_width,
            'window_height' => $StatusExpiration->window_height,
            'autorefresh' => $StatusExpiration->autorefresh,
            'tree' => $StatusExpiration->tree,
            'template' => $StatusExpiration->template,
            'active' => $StatusExpiration->active,
        ];
    }
}
