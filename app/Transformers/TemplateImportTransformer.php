<?php

namespace App\Transformers;

use App\Models\TemplateImport;
use League\Fractal\TransformerAbstract;

class TemplateImportTransformer extends TransformerAbstract
{
    public function transform(TemplateImport $TemplateImport)
    {
        return [
            'id' => $TemplateImport->id,
            'name' => $TemplateImport->name,
            'data_template' => $TemplateImport->data_template,
            'type' => $TemplateImport->type,
            'url' => $TemplateImport->url,
            'active' => $TemplateImport->active,
            'created_at' => $TemplateImport->created_at,
            'updated_at' => $TemplateImport->updated_at,
        ];
    }
}
