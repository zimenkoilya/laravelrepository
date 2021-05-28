<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogImport extends Model
{
    use HasFactory;
    protected $table = "log_imports";
    protected $fillable = [
        'account_id',
        'uri',
        'type',
        'content',
        'error',
        'ip',
        'created',
        'case_id',
    ];
}
