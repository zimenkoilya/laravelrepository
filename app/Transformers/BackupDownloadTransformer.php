<?php

namespace App\Transformers;

use App\Models\BackupDownload;
use League\Fractal\TransformerAbstract;

class BackupDownloadTransformer extends TransformerAbstract
{
    public function transform(BackupDownload $backupDownload)
    {
        return [
            'id' => $backupDownload->id,
            'type' => $backupDownload->type,
            'filename' => $backupDownload->filename,
            'created_at' => $backupDownload->created_at,
            'updated_at' => $backupDownload->updated_at,
        ];
    }
}
