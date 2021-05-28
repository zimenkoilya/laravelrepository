<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogFileImportDetail extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'log_file_imports_details';
    protected $fillable = [
        'file_import_id',
        'case_id',
        'line',
        'error',
        'created',
    ];
}
