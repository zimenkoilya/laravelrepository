<?php

namespace App\Transformers;

use App\Models\LogUpload;
use League\Fractal\TransformerAbstract;

class LogUploadTransformer extends TransformerAbstract
{
    public function transform(LogUpload $LogUpload)
    {
        return [
            'id' => $LogUpload->id,
            'name' => $LogUpload->name,
            'description' => $LogUpload->description,
            'permissions' => $LogUpload->permissions,
            'is_default' => $LogUpload->is_default,
            'created_at' => $LogUpload->created_at,
            'updated_at' => $LogUpload->updated_at
        ];
    }
}
