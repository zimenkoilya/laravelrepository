<?php

namespace App\Transformers;

use App\Models\WhitelistIP;
use League\Fractal\TransformerAbstract;

class WhitelistIPTransformer extends TransformerAbstract
{
    public function transform(WhitelistIP $WhitelistIP)
    {
        return [
            'id' => $WhitelistIP->id,
            'company' => $WhitelistIP->company_id,
            'ip' => $WhitelistIP->ip,
        ];
    }
}
