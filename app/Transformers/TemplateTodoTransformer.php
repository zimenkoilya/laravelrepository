<?php

namespace App\Transformers;

use App\Models\TemplateTodo;
use League\Fractal\TransformerAbstract;

class TemplateTodoTransformer extends TransformerAbstract
{
    public function transform(TemplateTodo $TemplateTodo)
    {
        return [
            'id' => $TemplateTodo->id,
            'name' => $TemplateTodo->name,
            'data_template' => $TemplateTodo->data_template,
            'type' => $TemplateTodo->type,
            'url' => $TemplateTodo->url,
            'active' => $TemplateTodo->active,
            'created_at' => $TemplateTodo->created_at,
            'updated_at' => $TemplateTodo->updated_at,
        ];
    }
}
