<?php

namespace App\Transformers;

use App\Models\OnboardingCompany;
use League\Fractal\TransformerAbstract;

class OnboardingCompanyTransformer extends TransformerAbstract
{
    public function transform(OnboardingCompany $OnboardingCompany)
    {
        return [
            'id' => $OnboardingCompany->id,
            'name' => $OnboardingCompany->name,
            'description' => $OnboardingCompany->description,
            'permissions' => $OnboardingCompany->permissions,
            'is_default' => $OnboardingCompany->is_default,
            'created_at' => $OnboardingCompany->created_at,
            'updated_at' => $OnboardingCompany->updated_at
        ];
    }
}
