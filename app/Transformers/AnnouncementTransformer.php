<?php

namespace App\Transformers;

use App\Models\Announcement;
use League\Fractal\TransformerAbstract;

class AnnouncementTransformer extends TransformerAbstract
{
    public function transform(Announcement $announcement)
    {
        return [
            'id' => $announcement->id,
            'message' => $announcement->message,
            'type' => $announcement->type,
            'active' => $announcement->active,
            'system' => $announcement->active,
            'created_at' => $announcement->created_at,
            'updated_at' => $announcement->updated_at,
        ];
    }
}
