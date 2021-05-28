<?php

namespace App\Transformers;

use App\Models\CreditreportTradeLine;
use League\Fractal\TransformerAbstract;

class CreditreportTradeLineTransformer extends TransformerAbstract
{
    public function transform(CreditreportTradeLine $CreditreportTradeLine)
    {
        return [
            'id' => $CreditreportTradeLine->id,
            'name' => $CreditreportTradeLine->name,
            'description' => $CreditreportTradeLine->description,
            'permissions' => $CreditreportTradeLine->permissions,
            'is_default' => $CreditreportTradeLine->is_default,
            'created_at' => $CreditreportTradeLine->created_at,
            'updated_at' => $CreditreportTradeLine->updated_at
        ];
    }
}
