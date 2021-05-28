<?php

namespace App\Transformers;

use App\Models\WorkOrderType;
use League\Fractal\TransformerAbstract;

class WorkOrderTypeTransformer extends TransformerAbstract
{
    public function transform(WorkOrderType $workorderType)
    {
        return [
            'id' => $service->id,
            'company' => $service->company,
        ];
    }
}
