<?php

namespace App\Transformers;

use App\Models\CreditreportInquiry;
use League\Fractal\TransformerAbstract;

class CreditreportInquiryTransformer extends TransformerAbstract
{
    public function transform(CreditreportInquiry $CreditreportInquiry)
    {
        return [
            'id' => $CreditreportInquiry->id,
            'name' => $CreditreportInquiry->name,
            'description' => $CreditreportInquiry->description,
            'permissions' => $CreditreportInquiry->permissions,
            'is_default' => $CreditreportInquiry->is_default,
            'created_at' => $CreditreportInquiry->created_at,
            'updated_at' => $CreditreportInquiry->updated_at
        ];
    }
}
