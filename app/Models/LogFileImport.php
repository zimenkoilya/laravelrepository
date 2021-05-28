<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogFileImport extends Model
{
    use HasFactory;
    protected $table = "log_file_imports";
    protected $fillable = [
        'company_id',
        'filename',
        'campaign_id',
        'action_id',
        'import_type',
        'created',
        'created_by',
        'import_filename',
        'filesize',
        'lines',
        'passed',
        'columns',
        'mapped',
    ];
}
