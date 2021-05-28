<?php

namespace App\Transformers;

use App\Models\FormField;
use League\Fractal\TransformerAbstract;

class FormFieldTransformer extends TransformerAbstract
{
    public function transform(FormField $FormField)
    {
        return [
            'id' => $FormField->id,
            'name' => $FormField->name,
            'description' => $FormField->description,
            'permissions' => $FormField->permissions,
            'is_default' => $FormField->is_default,
            'created_at' => $FormField->created_at,
            'updated_at' => $FormField->updated_at
        ];
    }
}
