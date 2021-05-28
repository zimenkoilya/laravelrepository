<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogCall extends Model
{
    use HasFactory;
    protected $table = "log_calls";
    protected $fillable = [
        'company_id',
        'uri',
        'type',
        'content',
        'ip',
        'created',
    ];
}
