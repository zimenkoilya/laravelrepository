<?php

namespace App\Transformers;

use App\Models\SupportTicket;
use League\Fractal\TransformerAbstract;

class SupportTicketTransformer extends TransformerAbstract
{
    public function transform(SupportTicket $SupportTicket)
    {
        return [
            'id' => $SupportTicket->id,
            'name' => $SupportTicket->name,
            'data_template' => $SupportTicket->data_template,
            'type' => $SupportTicket->type,
            'url' => $SupportTicket->url,
            'active' => $SupportTicket->active,
            'created_at' => $SupportTicket->created_at,
            'updated_at' => $SupportTicket->updated_at,
        ];
    }
}
