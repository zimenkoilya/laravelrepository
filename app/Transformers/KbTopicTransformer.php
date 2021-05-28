<?php

namespace App\Transformers;

use App\Models\KbTopic;
use League\Fractal\TransformerAbstract;

class KbTopicTransformer extends TransformerAbstract
{
    public function transform(KbTopic $KbTopic)
    {
        return [
            'id' => $KbTopic->id,
            'name' => $KbTopic->name,
            'description' => $KbTopic->description,
            'permissions' => $KbTopic->permissions,
            'is_default' => $KbTopic->is_default,
            'created_at' => $KbTopic->created_at,
            'updated_at' => $KbTopic->updated_at
        ];
    }
}
