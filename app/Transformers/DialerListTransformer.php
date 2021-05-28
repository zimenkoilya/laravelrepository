<?php

namespace App\Transformers;

use App\Models\DialerList;
use League\Fractal\TransformerAbstract;

class DialerListTransformer extends TransformerAbstract
{
    public function transform(DialerList $DialerList)
    {
        return [
            'id' => $DialerList->id,
            'name' => $DialerList->name,
            'description' => $DialerList->description,
            'permissions' => $DialerList->permissions,
            'is_default' => $DialerList->is_default,
            'created_at' => $DialerList->created_at,
            'updated_at' => $DialerList->updated_at
        ];
    }
}
