<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogError extends Model
{
    use HasFactory;
    protected $table = "log_errors";
    protected $fillable = [
        'case_id',
        'name',
        'message',
        'user',
        'created',
    ];
}
