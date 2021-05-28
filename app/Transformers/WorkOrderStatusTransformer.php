<?php

namespace App\Transformers;

use App\Models\WorkOrderStatus;
use League\Fractal\TransformerAbstract;

class WorkOrderStatusTransformer extends TransformerAbstract
{
    public function transform(WorkOrderStatus $workorderStatus)
    {
        return [
            'id' => $service->id,
            'name' => $service->name,
            'company' => $service->company,
        ];
    }
}
