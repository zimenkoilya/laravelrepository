<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogUpload extends Model
{
    use HasFactory;
    protected $table = "log_uploads";
    protected $fillable = [
        'list_name',
        'file_name',
        'imported',
        'duplicates',
        'list_total',
        'start_time',
        'end_time',
        'created_by',
    ];
}
