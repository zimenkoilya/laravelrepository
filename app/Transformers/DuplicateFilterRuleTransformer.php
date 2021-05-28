<?php

namespace App\Transformers;

use App\Models\DuplicateFilterRule;
use League\Fractal\TransformerAbstract;

class DuplicateFilterRuleTransformer extends TransformerAbstract
{
    public function transform(DuplicateFilterRule $DuplicateFilterRule)
    {
        return [
            'id' => $DuplicateFilterRule->id,
            'name' => $DuplicateFilterRule->name,
            'description' => $DuplicateFilterRule->description,
            'permissions' => $DuplicateFilterRule->permissions,
            'is_default' => $DuplicateFilterRule->is_default,
            'created_at' => $DuplicateFilterRule->created_at,
            'updated_at' => $DuplicateFilterRule->updated_at
        ];
    }
}
