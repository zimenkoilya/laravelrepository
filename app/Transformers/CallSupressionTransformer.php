<?php

namespace App\Transformers;

use App\Models\CallSupression;
use League\Fractal\TransformerAbstract;

class CallSupressionTransformer extends TransformerAbstract
{
    public function transform(CallSupression $CallSupression)
    {
        return [
            'id' => $CallSupression->id,
            'name' => $CallSupression->name,
            'description' => $CallSupression->description,
            'permissions' => $CallSupression->permissions,
            'is_default' => $CallSupression->is_default,
            'created_at' => $CallSupression->created_at,
            'updated_at' => $CallSupression->updated_at
        ];
    }
}
