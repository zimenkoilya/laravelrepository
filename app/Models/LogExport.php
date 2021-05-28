<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogExport extends Model
{
    use HasFactory;
    protected $table = "log_exports";
    protected $fillable = [
        'url',
        'data',
        'response',
        'created',
        'request_time',
    ];
}
