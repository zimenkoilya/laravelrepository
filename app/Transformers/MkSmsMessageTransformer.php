<?php

namespace App\Transformers;

use App\Models\MkSmsMessage;
use League\Fractal\TransformerAbstract;

class MkSmsMessageTransformer extends TransformerAbstract
{
    public function transform(MkSmsMessage $MkSmsMessage)
    {
        return [
            'id' => $MkSmsMessage->id,
            'name' => $MkSmsMessage->name,
            'description' => $MkSmsMessage->description,
            'permissions' => $MkSmsMessage->permissions,
            'is_default' => $MkSmsMessage->is_default,
            'created_at' => $MkSmsMessage->created_at,
            'updated_at' => $MkSmsMessage->updated_at
        ];
    }
}
