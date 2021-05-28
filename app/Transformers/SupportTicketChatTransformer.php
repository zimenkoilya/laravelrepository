<?php

namespace App\Transformers;

use App\Models\SupportTicketChat;
use League\Fractal\TransformerAbstract;

class SupportTicketChatTransformer extends TransformerAbstract
{
    public function transform(SupportTicketChat $SupportTicketChat)
    {
        return [
            'id' => $SupportTicketChat->id,
            'name' => $SupportTicketChat->name,
            'data_template' => $SupportTicketChat->data_template,
            'type' => $SupportTicketChat->type,
            'url' => $SupportTicketChat->url,
            'active' => $SupportTicketChat->active,
            'created_at' => $SupportTicketChat->created_at,
            'updated_at' => $SupportTicketChat->updated_at,
        ];
    }
}
