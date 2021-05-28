<?php

namespace App\Transformers;

use App\Models\FormSection;
use League\Fractal\TransformerAbstract;

class FormSectionTransformer extends TransformerAbstract
{
    public function transform(FormSection $FormSection)
    {
        return [
            'id' => $FormSection->id,
            'name' => $FormSection->name,
            'description' => $FormSection->description,
            'permissions' => $FormSection->permissions,
            'is_default' => $FormSection->is_default,
            'created_at' => $FormSection->created_at,
            'updated_at' => $FormSection->updated_at
        ];
    }
}
