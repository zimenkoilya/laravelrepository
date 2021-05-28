<?php

namespace App\Transformers;

use App\Models\EsignDoc;
use League\Fractal\TransformerAbstract;

class EsignDocTransformer extends TransformerAbstract
{
    public function transform(EsignDoc $EsignDoc)
    {
        return [
            'id' => $EsignDoc->id,
            'name' => $EsignDoc->name,
            'description' => $EsignDoc->description,
            'permissions' => $EsignDoc->permissions,
            'is_default' => $EsignDoc->is_default,
            'created_at' => $EsignDoc->created_at,
            'updated_at' => $EsignDoc->updated_at
        ];
    }
}
