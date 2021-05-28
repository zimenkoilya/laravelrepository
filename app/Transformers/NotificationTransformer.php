<?php

namespace App\Transformers;

use App\Models\Notification;
use League\Fractal\TransformerAbstract;

class NotificationTransformer extends TransformerAbstract
{
    public function transform(Notification $Notification)
    {
        return [
            'id' => $Notification->id,
            'name' => $Notification->name,
            'description' => $Notification->description,
            'permissions' => $Notification->permissions,
            'is_default' => $Notification->is_default,
            'created_at' => $Notification->created_at,
            'updated_at' => $Notification->updated_at
        ];
    }
}
