<?php

namespace App\Transformers;

use App\Models\EmailImap;
use League\Fractal\TransformerAbstract;

class EmailImapTransformer extends TransformerAbstract
{
    public function transform(EmailImap $EmailImap)
    {
        return [
            'id' => $EmailImap->id,
            'name' => $EmailImap->name,
            'description' => $EmailImap->description,
            'permissions' => $EmailImap->permissions,
            'is_default' => $EmailImap->is_default,
            'created_at' => $EmailImap->created_at,
            'updated_at' => $EmailImap->updated_at
        ];
    }
}
