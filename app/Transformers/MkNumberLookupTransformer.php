<?php

namespace App\Transformers;

use App\Models\MkNumberLookup;
use League\Fractal\TransformerAbstract;

class MkNumberLookupTransformer extends TransformerAbstract
{
    public function transform(MkNumberLookup $MkNumberLookup)
    {
        return [
            'id' => $MkNumberLookup->id,
            'name' => $MkNumberLookup->name,
            'description' => $MkNumberLookup->description,
            'permissions' => $MkNumberLookup->permissions,
            'is_default' => $MkNumberLookup->is_default,
            'created_at' => $MkNumberLookup->created_at,
            'updated_at' => $MkNumberLookup->updated_at
        ];
    }
}
