<?php

namespace App\Transformers;

use App\Models\EmailFilter;
use League\Fractal\TransformerAbstract;

class EmailFilterTransformer extends TransformerAbstract
{
    public function transform(EmailFilter $EmailFilter)
    {
        return [
            'id' => $EmailFilter->id,
            'name' => $EmailFilter->name,
            'description' => $EmailFilter->description,
            'permissions' => $EmailFilter->permissions,
            'is_default' => $EmailFilter->is_default,
            'created_at' => $EmailFilter->created_at,
            'updated_at' => $EmailFilter->updated_at
        ];
    }
}
