<?php

namespace App\Transformers;

use App\Models\ActionGroup;
use League\Fractal\TransformerAbstract;

class ActionGroupTransformer extends TransformerAbstract
{
    public function transform(ActionGroup $actionGroup)
    {
        return [
            'id' => $actionGroup->id,
            'name' => $actionGroup->name
        ];
    }
}
