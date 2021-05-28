<?php

namespace App\Transformers;

use App\Models\BillingFormEvent;
use League\Fractal\TransformerAbstract;

class BillingFormEventTransformer extends TransformerAbstract
{
    public function transform(BillingFormEvent $billingFormEvent)
    {
        return [
            'id' => $billingFormEvent->id,
            'billing_form' => $billingFormEvent->billing_form,
            'event' => $billingFormEvent->event,
            'created_at' => $billingFormEvent->created_at,
            'updated_at' => $billingFormEvent->updated_at,
        ];
    }
}
