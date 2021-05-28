<?php

namespace App\Transformers;

use App\Models\SupportTicketAttachment;
use League\Fractal\TransformerAbstract;

class SupportTicketAttachmentTransformer extends TransformerAbstract
{
    public function transform(SupportTicketAttachment $SupportTicketAttachment)
    {
        return [
            'id' => $SupportTicketAttachment->id,
            'name' => $SupportTicketAttachment->name,
            'data_template' => $SupportTicketAttachment->data_template,
            'type' => $SupportTicketAttachment->type,
            'url' => $SupportTicketAttachment->url,
            'active' => $SupportTicketAttachment->active,
            'created_at' => $SupportTicketAttachment->created_at,
            'updated_at' => $SupportTicketAttachment->updated_at,
        ];
    }
}
