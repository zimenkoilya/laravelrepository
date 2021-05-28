<?php

namespace App\Transformers;

use App\Models\Lists;
use League\Fractal\TransformerAbstract;

class ListTransformer extends TransformerAbstract
{
    public function transform(Lists $list)
    {
        return [
            'id' => $list->id,
            'name' => $list->name,
            'description' => $list->description,
            'campaigns_count' => count($list->campaigns),
            'users_count' => count($list->users),
            'created_at' => $list->created_at,
            'updated_at' => $list->updated_at,
        ];
    }
}
