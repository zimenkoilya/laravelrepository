<?php

namespace App\Transformers;

use App\Models\DocumentDownload;
use League\Fractal\TransformerAbstract;

class DocumentDownloadTransformer extends TransformerAbstract
{
    public function transform(DocumentDownload $DocumentDownload)
    {
        return [
            'id' => $DocumentDownload->id,
            'name' => $DocumentDownload->name,
            'description' => $DocumentDownload->description,
            'permissions' => $DocumentDownload->permissions,
            'is_default' => $DocumentDownload->is_default,
            'created_at' => $DocumentDownload->created_at,
            'updated_at' => $DocumentDownload->updated_at
        ];
    }
}
