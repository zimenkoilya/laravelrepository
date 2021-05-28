<?php

namespace App\Transformers;

use App\Models\WorkOrder;
use League\Fractal\TransformerAbstract;

class WorkOrderTransformer extends TransformerAbstract
{
    public function transform(WorkOrder $workorder)
    {
        return [
            'id' => $workorder->id,
            'name' => $workorder->name,
            'company' => $workorder->company,
        ];
    }
}
