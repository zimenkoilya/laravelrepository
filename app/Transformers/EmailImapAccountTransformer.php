<?php

namespace App\Transformers;

use App\Models\EmailImapAccount;
use League\Fractal\TransformerAbstract;

class EmailImapAccountTransformer extends TransformerAbstract
{
    public function transform(EmailImapAccount $EmailImapAccount)
    {
        return [
            'id' => $EmailImapAccount->id,
            'name' => $EmailImapAccount->name,
            'description' => $EmailImapAccount->description,
            'permissions' => $EmailImapAccount->permissions,
            'is_default' => $EmailImapAccount->is_default,
            'created_at' => $EmailImapAccount->created_at,
            'updated_at' => $EmailImapAccount->updated_at
        ];
    }
}
