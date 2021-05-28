<?php

namespace App\Transformers;

use App\Models\CallDid;
use League\Fractal\TransformerAbstract;

class CallDidTransformer extends TransformerAbstract
{
    public function transform(CallDid $CallDid)
    {
        return [
            'id' => $CallDid->id,
            'name' => $CallDid->name,
            'description' => $CallDid->description,
            'permissions' => $CallDid->permissions,
            'is_default' => $CallDid->is_default,
            'created_at' => $CallDid->created_at,
            'updated_at' => $CallDid->updated_at
        ];
    }
}
