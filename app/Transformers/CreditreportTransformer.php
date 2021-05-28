<?php

namespace App\Transformers;

use App\Models\Creditreport;
use League\Fractal\TransformerAbstract;

class CreditreportTransformer extends TransformerAbstract
{
    public function transform(Creditreport $Creditreport)
    {
        return [
            'id' => $Creditreport->id,
            'name' => $Creditreport->name,
            'description' => $Creditreport->description,
            'permissions' => $Creditreport->permissions,
            'is_default' => $Creditreport->is_default,
            'created_at' => $Creditreport->created_at,
            'updated_at' => $Creditreport->updated_at
        ];
    }
}
