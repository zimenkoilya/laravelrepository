<?php

namespace App\Transformers;

use App\Models\Milestone;
use League\Fractal\TransformerAbstract;

class MilestoneTransformer extends TransformerAbstract
{
    public function transform(Milestone $milestone)
    {
        return [
            'id' => $milestone->id,
            'name' => $milestone->name,
            'sort' => $milestone->sort
        ];
    }
}
