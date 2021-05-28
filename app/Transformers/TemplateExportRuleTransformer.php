<?php

namespace App\Transformers;

use App\Models\TemplateExportRule;
use League\Fractal\TransformerAbstract;

class TemplateExportRuleTransformer extends TransformerAbstract
{
    public function transform(TemplateExportRule $TemplateExportRule)
    {
        return [
            'id' => $TemplateExportRule->id,
            'name' => $TemplateExportRule->name,
            'data_template' => $TemplateExportRule->data_template,
            'type' => $TemplateExportRule->type,
            'url' => $TemplateExportRule->url,
            'active' => $TemplateExportRule->active,
            'created_at' => $TemplateExportRule->created_at,
            'updated_at' => $TemplateExportRule->updated_at,
        ];
    }
}
