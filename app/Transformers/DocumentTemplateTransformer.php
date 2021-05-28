<?php

namespace App\Transformers;

use App\Models\DocumentTemplate;
use League\Fractal\TransformerAbstract;

class DocumentTemplateTransformer extends TransformerAbstract
{
    public function transform(DocumentTemplate $documentTemplate)
    {
        return [
            'id' => $documentTemplate->id,
            'name' => $documentTemplate->name
        ];
    }
}
