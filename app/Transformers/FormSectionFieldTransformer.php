<?php

namespace App\Transformers;

use App\Models\FormSectionField;
use League\Fractal\TransformerAbstract;

class FormSectionFieldTransformer extends TransformerAbstract
{
    public function transform(FormSectionField $FormSectionField)
    {
        return [
            'id' => $FormSectionField->id,
            'name' => $FormSectionField->name,
            'description' => $FormSectionField->description,
            'permissions' => $FormSectionField->permissions,
            'is_default' => $FormSectionField->is_default,
            'created_at' => $FormSectionField->created_at,
            'updated_at' => $FormSectionField->updated_at
        ];
    }
}
