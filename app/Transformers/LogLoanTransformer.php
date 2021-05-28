<?php

namespace App\Transformers;

use App\Models\LogLoan;
use League\Fractal\TransformerAbstract;

class LogLoanTransformer extends TransformerAbstract
{
    public function transform(LogLoan $LogLoan)
    {
        return [
            'id' => $LogLoan->id,
            'name' => $LogLoan->name,
            'description' => $LogLoan->description,
            'permissions' => $LogLoan->permissions,
            'is_default' => $LogLoan->is_default,
            'created_at' => $LogLoan->created_at,
            'updated_at' => $LogLoan->updated_at
        ];
    }
}
