<?php

namespace App\Transformers;

use App\Models\FormFieldAccount;
use League\Fractal\TransformerAbstract;

class FormFieldAccountTransformer extends TransformerAbstract
{
    public function transform(FormFieldAccount $FormFieldAccount)
    {
        return [
            'id' => $FormFieldAccount->id,
            'name' => $FormFieldAccount->name,
            'description' => $FormFieldAccount->description,
            'permissions' => $FormFieldAccount->permissions,
            'is_default' => $FormFieldAccount->is_default,
            'created_at' => $FormFieldAccount->created_at,
            'updated_at' => $FormFieldAccount->updated_at
        ];
    }
}
