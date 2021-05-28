<?php

namespace App\Transformers;

use App\Models\AccountingType;
use League\Fractal\TransformerAbstract;

class AccountingTypeTransformer extends TransformerAbstract
{
    public function transform(AccountingType $accountingType)
    {
        return [
            'id' => $accountingType->id,
            'name' => $accountingType->name,
            'description' => $accountingType->description
        ];
    }
}
