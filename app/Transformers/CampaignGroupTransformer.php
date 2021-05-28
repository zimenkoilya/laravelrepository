<?php

namespace App\Transformers;

use App\Models\CampaignGroup;
use League\Fractal\TransformerAbstract;

class CampaignGroupTransformer extends TransformerAbstract
{
    public function transform(CampaignGroup $campaign_group)
    {
        return [
            'id' => $campaign_group->id,
            'name' => $campaign_group->name,
            'description' => $campaign_group->description,
            'campaigns_count' => count($campaign_group->campaigns),
            'users_count' => count($campaign_group->users),
            'created_at' => $campaign_group->created_at,
            'updated_at' => $campaign_group->updated_at,
        ];
    }
}
