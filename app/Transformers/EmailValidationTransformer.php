<?php

namespace App\Transformers;

use App\Models\EmailValidation;
use League\Fractal\TransformerAbstract;

class EmailValidationTransformer extends TransformerAbstract
{
    public function transform(EmailValidation $EmailValidation)
    {
        return [
            'id' => $EmailValidation->id,
            'name' => $EmailValidation->name,
            'description' => $EmailValidation->description,
            'permissions' => $EmailValidation->permissions,
            'is_default' => $EmailValidation->is_default,
            'created_at' => $EmailValidation->created_at,
            'updated_at' => $EmailValidation->updated_at
        ];
    }
}
