<?php

namespace App\Transformers;

use App\Models\TimeclockReport;
use League\Fractal\TransformerAbstract;

class TimeclockReportTransformer extends TransformerAbstract
{
    public function transform(TimeclockReport $TimeclockReport)
    {
        return [
            'id' => $TimeclockReport->id,
            'name' => $TimeclockReport->name,
            'role' => $TimeclockReport->role,
        ];
    }
}
