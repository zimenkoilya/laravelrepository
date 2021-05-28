<?php

namespace App\Transformers;

use App\Models\Team;
use League\Fractal\TransformerAbstract;

class TeamTransformer extends TransformerAbstract
{
    public function transform(Team $Team)
    {
        return [
            'id' => $Team->id,
            'name' => $Team->name,
            'data_template' => $Team->data_template,
            'type' => $Team->type,
            'url' => $Team->url,
            'active' => $Team->active,
            'created_at' => $Team->created_at,
            'updated_at' => $Team->updated_at,
        ];
    }
}
