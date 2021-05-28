<?php

namespace App\Transformers;

use App\Models\Form;
use League\Fractal\TransformerAbstract;

class FormTransformer extends TransformerAbstract
{
    public function transform(Form $Form)
    {
        return [
            'id' => $Form->id,
            'name' => $Form->name,
            'description' => $Form->description,
            'permissions' => $Form->permissions,
            'is_default' => $Form->is_default,
            'created_at' => $Form->created_at,
            'updated_at' => $Form->updated_at
        ];
    }
}
