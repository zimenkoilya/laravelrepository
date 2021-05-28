<?php

namespace App\Transformers;

use App\Models\StatusExpiration;
use League\Fractal\TransformerAbstract;

class StatusExpirationTransformer extends TransformerAbstract
{
    public function transform(StatusExpiration $StatusExpiration)
    {
        return [
            'id' => $StatusExpiration->id,
            'case_id' => $StatusExpiration->case_id,
            'sid' => $StatusExpiration->sid,
            'to_number' => $StatusExpiration->to_number,
            'from_number' => $StatusExpiration->from_number,
            'message' => $StatusExpiration->message,
            'delivered' => $StatusExpiration->delivered,
            'direction' => $StatusExpiration->direction,
            'message_user_id' => $StatusExpiration->message_user_id,
            'viewed_by' => $StatusExpiration->viewed_by,
            'viewed_date' => $StatusExpiration->viewed_date,
            'replied_by' => $StatusExpiration->replied_by,
            'replied_date' => $StatusExpiration->replied_date,
            'created_date' => $StatusExpiration->created_date,
            'created_by' => $StatusExpiration->created_by,
            'archived' => $StatusExpiration->archived,
            'template_id' => $StatusExpiration->template_id,
            'doc_id' => $StatusExpiration->doc_id,
            'segments' => $StatusExpiration->segments,
            'ct_id' => $StatusExpiration->ct_id,
            'cost_' => $StatusExpiration->cost_,
            'updated' => $StatusExpiration->updated,
        ];
    }
}
