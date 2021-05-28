<?php

namespace App\Transformers;

use App\Models\Areacode;
use League\Fractal\TransformerAbstract;

class AreacodeTransformer extends TransformerAbstract
{
    public function transform(Areacode $areacode)
    {
        return [
            'area_code' => $areacode->area_code,
            'region' => $areacode->Region,
            'description' => $areacode->Description
        ];
    }
}
