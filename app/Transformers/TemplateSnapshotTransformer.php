<?php

namespace App\Transformers;

use App\Models\TemplateSnapshot;
use League\Fractal\TransformerAbstract;

class TemplateSnapshotTransformer extends TransformerAbstract
{
    public function transform(TemplateSnapshot $TemplateSnapshot)
    {
        return [
            'id' => $TemplateSnapshot->id,
            'name' => $TemplateSnapshot->name,
            'data_template' => $TemplateSnapshot->data_template,
            'type' => $TemplateSnapshot->type,
            'url' => $TemplateSnapshot->url,
            'active' => $TemplateSnapshot->active,
            'created_at' => $TemplateSnapshot->created_at,
            'updated_at' => $TemplateSnapshot->updated_at,
        ];
    }
}
