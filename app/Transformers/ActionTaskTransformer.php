<?php

namespace App\Transformers;

use App\Models\ActionTask;
use League\Fractal\TransformerAbstract;

class ActionTaskTransformer extends TransformerAbstract
{
    public function transform(ActionTask $actionTask)
    {
        return [
            'id' => $actionTask->id,
            'name' => $actionTask->name,
            'label' => $actionTask->label,
            'options_table' => $actionTask->options_table,
            'company_based' => $actionTask->company_based
        ];
    }
}
