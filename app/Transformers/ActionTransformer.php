<?php

namespace App\Transformers;

use App\Models\Action;
use League\Fractal\TransformerAbstract;

class ActionTransformer extends TransformerAbstract
{
    public function transform(Action $action)
    {
        return [
            'id' => $action->id,
            'name' => $action->name,
            'description' => $action->description,
            'created_at' => $action->created_at,
            'updated_at' => $action->updated_at,
        ];
    }
}
