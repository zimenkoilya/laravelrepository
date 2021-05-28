<?php

namespace App\Transformers;

use App\Models\Leaderboard;
use League\Fractal\TransformerAbstract;

class LeaderboardTransformer extends TransformerAbstract
{
    public function transform(Leaderboard $Leaderboard)
    {
        return [
            'id' => $Leaderboard->id,
            'name' => $Leaderboard->name,
            'description' => $Leaderboard->description,
            'permissions' => $Leaderboard->permissions,
            'is_default' => $Leaderboard->is_default,
            'created_at' => $Leaderboard->created_at,
            'updated_at' => $Leaderboard->updated_at
        ];
    }
}
