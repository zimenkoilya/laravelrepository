<?php

namespace App\Transformers;

use App\Models\Subscription;
use League\Fractal\TransformerAbstract;

class SubscriptionTransformer extends TransformerAbstract
{
    public function transform(Subscription $Subscription)
    {
        return [
            'id' => $Subscription->id,
            'name' => $Subscription->name,
            'data_template' => $Subscription->data_template,
            'type' => $Subscription->type,
            'url' => $Subscription->url,
            'active' => $Subscription->active,
            'created_at' => $Subscription->created_at,
            'updated_at' => $Subscription->updated_at,
        ];
    }
}
