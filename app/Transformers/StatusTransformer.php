<?php

namespace App\Transformers;

use App\Models\Status;
use League\Fractal\TransformerAbstract;

class StatusTransformer extends TransformerAbstract
{
    public function transform(Status $status)
    {
        return [
            'id' => $status->id,
            'name' => $status->name,
            'description' => $status->description,
            'type' => $status->type,
            'level' => $status->level,
            'sort' => $status->sort,
            'payable' => $status->payable,
            'shared' => $status->shared,
            'anytime' => $status->anytime,
            'system' => $status->system,
            'active' => $status->active,
            'group' => $status->group
        ];
    }
}
