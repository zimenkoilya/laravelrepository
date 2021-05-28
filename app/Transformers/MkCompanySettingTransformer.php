<?php

namespace App\Transformers;

use App\Models\MkCompanySetting;
use League\Fractal\TransformerAbstract;

class MkCompanySettingTransformer extends TransformerAbstract
{
    public function transform(MkCompanySetting $MkCompanySetting)
    {
        return [
            'id' => $MkCompanySetting->id,
            'name' => $MkCompanySetting->name,
            'description' => $MkCompanySetting->description,
            'permissions' => $MkCompanySetting->permissions,
            'is_default' => $MkCompanySetting->is_default,
            'created_at' => $MkCompanySetting->created_at,
            'updated_at' => $MkCompanySetting->updated_at
        ];
    }
}
