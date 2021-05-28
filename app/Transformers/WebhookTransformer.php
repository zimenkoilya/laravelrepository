<?php

namespace App\Transformers;

use App\Models\Webhook;
use League\Fractal\TransformerAbstract;

class WebhookTransformer extends TransformerAbstract
{
    public function transform(Webhook $Webhook)
    {
        return [
            'id' => $Webhook->id,
            'name' => $Webhook->name,
            'role' => $Webhook->role,
        ];
    }
}
