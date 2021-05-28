<?php

namespace App\Transformers;

use App\Models\AssociateGroup;
use League\Fractal\TransformerAbstract;

class AssociateGroupTransformer extends TransformerAbstract
{
    public function transform(AssociateGroup $associateGroup)
    {
        return [
            'id' => $associateGroup->id,
            'group_name' => $associateGroup->group_name,
            'created_at' => $associateGroup->created_at,
            'updated_at' => $associateGroup->updated_at,
        ];
    }
}
