<?php

namespace App\Transformers;

use App\Models\ChatMessage;
use League\Fractal\TransformerAbstract;

class ChatMessageTransformer extends TransformerAbstract
{
    public function transform(ChatMessage $ChatMessage)
    {
        return [
            'id' => $ChatMessage->id,
            'name' => $ChatMessage->name,
            'description' => $ChatMessage->description,
            'permissions' => $ChatMessage->permissions,
            'is_default' => $ChatMessage->is_default,
            'created_at' => $ChatMessage->created_at,
            'updated_at' => $ChatMessage->updated_at
        ];
    }
}
