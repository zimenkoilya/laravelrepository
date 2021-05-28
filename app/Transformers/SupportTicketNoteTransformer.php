<?php

namespace App\Transformers;

use App\Models\SupportTicketNote;
use League\Fractal\TransformerAbstract;

class SupportTicketNoteTransformer extends TransformerAbstract
{
    public function transform(SupportTicketNote $SupportTicketNote)
    {
        return [
            'id' => $SupportTicketNote->id,
            'name' => $SupportTicketNote->name,
            'data_template' => $SupportTicketNote->data_template,
            'type' => $SupportTicketNote->type,
            'url' => $SupportTicketNote->url,
            'active' => $SupportTicketNote->active,
            'created_at' => $SupportTicketNote->created_at,
            'updated_at' => $SupportTicketNote->updated_at,
        ];
    }
}
