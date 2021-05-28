<?php

namespace App\Transformers;

use App\Models\CreditrepairLetter;
use League\Fractal\TransformerAbstract;

class CreditrepairLetterTransformer extends TransformerAbstract
{
    public function transform(CreditrepairLetter $CreditrepairLetter)
    {
        return [
            'id' => $CreditrepairLetter->id,
            'name' => $CreditrepairLetter->name,
            'description' => $CreditrepairLetter->description,
            'permissions' => $CreditrepairLetter->permissions,
            'is_default' => $CreditrepairLetter->is_default,
            'created_at' => $CreditrepairLetter->created_at,
            'updated_at' => $CreditrepairLetter->updated_at
        ];
    }
}
