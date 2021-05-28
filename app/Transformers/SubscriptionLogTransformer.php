<?php

namespace App\Transformers;

use App\Models\SubscriptionLog;
use League\Fractal\TransformerAbstract;

class SubscriptionLogTransformer extends TransformerAbstract
{
    public function transform(SubscriptionLog $SubscriptionLog)
    {
        return [
            'id' => $SubscriptionLog->id,
            'name' => $SubscriptionLog->name,
            'data_template' => $SubscriptionLog->data_template,
            'type' => $SubscriptionLog->type,
            'url' => $SubscriptionLog->url,
            'active' => $SubscriptionLog->active,
            'created_at' => $SubscriptionLog->created_at,
            'updated_at' => $SubscriptionLog->updated_at,
        ];
    }
}
