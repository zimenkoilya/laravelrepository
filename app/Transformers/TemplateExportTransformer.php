<?php

namespace App\Transformers;

use App\Models\TemplateExport;
use League\Fractal\TransformerAbstract;

class TemplateExportTransformer extends TransformerAbstract
{
    public function transform(TemplateExport $TemplateExport)
    {
        return [
            'id' => $TemplateExport->id,
            'name' => $TemplateExport->name,
            'data_template' => $TemplateExport->data_template,
            'type' => $TemplateExport->type,
            'url' => $TemplateExport->url,
            'active' => $TemplateExport->active,
            'created_at' => $TemplateExport->created_at,
            'updated_at' => $TemplateExport->updated_at,
        ];
    }
}
