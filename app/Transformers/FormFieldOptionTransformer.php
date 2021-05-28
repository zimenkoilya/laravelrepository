<?php

namespace App\Transformers;

use App\Models\FormFieldOption;
use League\Fractal\TransformerAbstract;

class FormFieldOptionTransformer extends TransformerAbstract
{
    public function transform(FormFieldOption $FormFieldOption)
    {
        return [
            'id' => $FormFieldOption->id,
            'name' => $FormFieldOption->name,
            'description' => $FormFieldOption->description,
            'permissions' => $FormFieldOption->permissions,
            'is_default' => $FormFieldOption->is_default,
            'created_at' => $FormFieldOption->created_at,
            'updated_at' => $FormFieldOption->updated_at
        ];
    }
}
