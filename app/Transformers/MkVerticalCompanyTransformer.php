<?php

namespace App\Transformers;

use App\Models\MkVerticalCompany;
use League\Fractal\TransformerAbstract;

class MkVerticalCompanyTransformer extends TransformerAbstract
{
    public function transform(MkVerticalCompany $MkVerticalCompany)
    {
        return [
            'id' => $MkVerticalCompany->id,
            'name' => $MkVerticalCompany->name,
            'description' => $MkVerticalCompany->description,
            'permissions' => $MkVerticalCompany->permissions,
            'is_default' => $MkVerticalCompany->is_default,
            'created_at' => $MkVerticalCompany->created_at,
            'updated_at' => $MkVerticalCompany->updated_at
        ];
    }
}
