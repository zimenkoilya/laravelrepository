<?php

namespace App\Transformers;

use App\Models\SupportTicketActivity;
use League\Fractal\TransformerAbstract;

class SupportTicketActivityTransformer extends TransformerAbstract
{
    public function transform(SupportTicketActivity $SupportTicketActivity)
    {
        return [
            'id' => $SupportTicketActivity->id,
            'name' => $SupportTicketActivity->name,
            'data_template' => $SupportTicketActivity->data_template,
            'type' => $SupportTicketActivity->type,
            'url' => $SupportTicketActivity->url,
            'active' => $SupportTicketActivity->active,
            'created_at' => $SupportTicketActivity->created_at,
            'updated_at' => $SupportTicketActivity->updated_at,
        ];
    }
}
