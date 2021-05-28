<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSession extends Model
{
    use HasFactory;
    protected $table = "user_sessions";
    protected $fillable = [
        'session_id',
        'timestamp',
        'active',
        'ip_address',
    ];
}
