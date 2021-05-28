<?php

namespace App\Transformers;

use App\Models\EsignServicer;
use League\Fractal\TransformerAbstract;

class EsignServicerTransformer extends TransformerAbstract
{
    public function transform(EsignServicer $EsignServicer)
    {
        return [
            'id' => $EsignServicer->id,
            'name' => $EsignServicer->name,
            'description' => $EsignServicer->description,
            'permissions' => $EsignServicer->permissions,
            'is_default' => $EsignServicer->is_default,
            'created_at' => $EsignServicer->created_at,
            'updated_at' => $EsignServicer->updated_at
        ];
    }
}
