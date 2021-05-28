<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogRoute extends Model
{
    use HasFactory;
    protected $table = "log_routes";
    protected $fillable = [
        'messege_user_id',
        'msg_rule_id',
        'type',
        'pkid',
        'created',
    ];
}
