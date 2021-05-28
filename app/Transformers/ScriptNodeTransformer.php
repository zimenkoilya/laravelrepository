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
            'user_id' => $StatusExpiration->user_id,
            'case_id' => $StatusExpiration->case_id,
            'script_id' => $StatusExpiration->script_id,
            'created' => $StatusExpiration->created,
            'completed' => $StatusExpiration->completed,
        ];
    }
}
