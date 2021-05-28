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
            'node_id' => $StatusExpiration->node_id,
            'button_text' => $StatusExpiration->button_text,
            'action_node_id' => $StatusExpiration->action_node_id,
            'score' => $StatusExpiration->score,
        ];
    }
}
