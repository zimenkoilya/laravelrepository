<?php

namespace App\Transformers;

use App\Models\TemplateCommunication;
use League\Fractal\TransformerAbstract;

class TemplateCommunicationTransformer extends TransformerAbstract
{
    public function transform(TemplateCommunication $TemplateCommunication)
    {
        return [
            'id' => $TemplateCommunication->id,
            'name' => $TemplateCommunication->name,
            'data_template' => $TemplateCommunication->data_template,
            'type' => $TemplateCommunication->type,
            'url' => $TemplateCommunication->url,
            'active' => $TemplateCommunication->active,
            'created_at' => $TemplateCommunication->created_at,
            'updated_at' => $TemplateCommunication->updated_at,
        ];
    }
}
