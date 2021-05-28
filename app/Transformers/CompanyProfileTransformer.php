<?php

namespace App\Transformers;

use App\Models\CompanyProfile;
use League\Fractal\TransformerAbstract;

class CompanyProfileTransformer extends TransformerAbstract
{
    public function transform(CompanyProfile $CompanyProfile)
    {
        return [
            'id' => $CompanyProfile->id,
            'name' => $CompanyProfile->name,
            'description' => $CompanyProfile->description,
            'permissions' => $CompanyProfile->permissions,
            'is_default' => $CompanyProfile->is_default,
            'created_at' => $CompanyProfile->created_at,
            'updated_at' => $CompanyProfile->updated_at
        ];
    }
}
