<?php

namespace App\Transformers;

use App\Models\Import;
use League\Fractal\TransformerAbstract;

class ImportTransformer extends TransformerAbstract
{
    public function transform(Import $import)
    {
        return [
            'id' => $import->id,
            'name' => $import->name,
            'data_template' => $import->data_template,
            'action' => $import->action,
            'hash' => $import->hash,
            'active' => $import->active,
            'created_at' => $import->created_at,
            'updated_at' => $import->updated_at,
        ];
    }
}
