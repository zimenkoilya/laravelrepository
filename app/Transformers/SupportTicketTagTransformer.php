<?php

namespace App\Transformers;

use App\Models\SupportTicketTag;
use League\Fractal\TransformerAbstract;

class SupportTicketTagTransformer extends TransformerAbstract
{
    public function transform(SupportTicketTag $SupportTicketTag)
    {
        return [
            'id' => $SupportTicketTag->id,
            'name' => $SupportTicketTag->name,
            'data_template' => $SupportTicketTag->data_template,
            'type' => $SupportTicketTag->type,
            'url' => $SupportTicketTag->url,
            'active' => $SupportTicketTag->active,
            'created_at' => $SupportTicketTag->created_at,
            'updated_at' => $SupportTicketTag->updated_at,
        ];
    }
}
