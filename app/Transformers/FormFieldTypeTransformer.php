<?php

namespace App\Transformers;

use App\Models\FormFieldType;
use League\Fractal\TransformerAbstract;

class FormFieldTypeTransformer extends TransformerAbstract
{
    public function transform(FormFieldType $FormFieldType)
    {
        return [
            'id' => $FormFieldType->id,
            'name' => $FormFieldType->name,
            'description' => $FormFieldType->description,
            'permissions' => $FormFieldType->permissions,
            'is_default' => $FormFieldType->is_default,
            'created_at' => $FormFieldType->created_at,
            'updated_at' => $FormFieldType->updated_at
        ];
    }
}
