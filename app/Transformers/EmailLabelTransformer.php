<?php

namespace App\Transformers;

use App\Models\EmailLabel;
use League\Fractal\TransformerAbstract;

class EmailLabelTransformer extends TransformerAbstract
{
    public function transform(EmailLabel $EmailLabel)
    {
        return [
            'id' => $EmailLabel->id,
            'name' => $EmailLabel->name,
            'description' => $EmailLabel->description,
            'permissions' => $EmailLabel->permissions,
            'is_default' => $EmailLabel->is_default,
            'created_at' => $EmailLabel->created_at,
            'updated_at' => $EmailLabel->updated_at
        ];
    }
}
