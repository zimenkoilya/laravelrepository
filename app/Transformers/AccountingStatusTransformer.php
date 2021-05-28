<?php

namespace App\Transformers;

use App\Models\AccountingStatus;
use League\Fractal\TransformerAbstract;

class AccountingStatusTransformer extends TransformerAbstract
{
    public function transform(AccountingStatus $accountingStatus)
    {
        return [
            'id' => $accountingStatus->id,
            'name' => $accountingStatus->name,
            'created_at' => $accountingStatus->created_at
        ];
    }
}
