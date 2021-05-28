<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BackupDownload extends Model
{
    use HasFactory;

    protected $table = "backup_downloads";
    protected $fillable = [
        'case_id',
        'record_id',
        'type',
        'filename'
    ];

    /**
     * Get the case.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cases()
    {
        return $this->belongsTo(Cases::class, 'case_id');
    }
}
