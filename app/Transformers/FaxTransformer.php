<?php

namespace App\Transformers;

use App\Models\Fax;
use League\Fractal\TransformerAbstract;

class FaxTransformer extends TransformerAbstract
{
    public function transform(Fax $Fax)
    {
        return [
            'id' => $Fax->id,
            'name' => $Fax->name,
            'description' => $Fax->description,
            'permissions' => $Fax->permissions,
            'is_default' => $Fax->is_default,
            'created_at' => $Fax->created_at,
            'updated_at' => $Fax->updated_at
        ];
    }
}
