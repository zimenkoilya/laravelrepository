<?php

namespace App\Transformers;

use App\Models\TemplateNote;
use League\Fractal\TransformerAbstract;

class TemplateNoteTransformer extends TransformerAbstract
{
    public function transform(TemplateNote $TemplateNote)
    {
        return [
            'id' => $TemplateNote->id,
            'name' => $TemplateNote->name,
            'data_template' => $TemplateNote->data_template,
            'type' => $TemplateNote->type,
            'url' => $TemplateNote->url,
            'active' => $TemplateNote->active,
            'created_at' => $TemplateNote->created_at,
            'updated_at' => $TemplateNote->updated_at,
        ];
    }
}
