<?php

namespace App\Transformers;

use App\Models\Campaign;
use League\Fractal\TransformerAbstract;

class CampaignTransformer extends TransformerAbstract
{
    public function transform(Campaign $campaign)
    {
        return [
            'id' => $campaign->id,
            'company' => $campaign->company,
            'group' => $campaign->group,
            'name' => $campaign->name,
            'description' => $campaign->description,
            'created_at' => $campaign->created_at,
            'updated_at' => $campaign->updated_at,
        ];
    }
}
