<?php

namespace App\Transformers;

use App\Models\MailingActivityLog;
use League\Fractal\TransformerAbstract;

class MailingActivityLogTransformer extends TransformerAbstract
{
    public function transform(MailingActivityLog $MailingActivityLog)
    {
        return [
            'id' => $MailingActivityLog->id,
            'name' => $MailingActivityLog->name,
            'description' => $MailingActivityLog->description,
            'permissions' => $MailingActivityLog->permissions,
            'is_default' => $MailingActivityLog->is_default,
            'created_at' => $MailingActivityLog->created_at,
            'updated_at' => $MailingActivityLog->updated_at
        ];
    }
}
