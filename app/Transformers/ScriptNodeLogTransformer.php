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
            'session_id' => $StatusExpiration->session_id,
            'user_id' => $StatusExpiration->user_id,
            'from_node_id' => $StatusExpiration->from_node_id,
            'node_id' => $StatusExpiration->node_id,
            'created' => $StatusExpiration->created,
        ];
    }
}
