<?php

namespace App\Transformers;

use App\Models\Export;
use League\Fractal\TransformerAbstract;

class ExportTransformer extends TransformerAbstract
{
    public function transform(Export $export)
    {
        return [
            'id' => $export->id,
            'name' => $export->name,
            'data_template' => $export->data_template,
            'type' => $export->type,
            'url' => $export->url,
            'active' => $export->active,
            'created_at' => $export->created_at,
            'updated_at' => $export->updated_at,
        ];
    }
}
