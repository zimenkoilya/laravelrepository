<?php

namespace App\Transformers;

use App\Models\DistributionGroup;
use League\Fractal\TransformerAbstract;

class DistributionGroupTransformer extends TransformerAbstract
{
    public function transform(DistributionGroup $distribution_group)
    {
        return [
            'id' => $distribution_group->id,
            'name' => $distribution_group->name,
            'users' => $distribution_group->users,
            'created_at' => $distribution_group->created_at,
            'updated_at' => $distribution_group->updated_at,
        ];
    }
}
