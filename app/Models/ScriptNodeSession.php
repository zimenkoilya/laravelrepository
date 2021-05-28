<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScriptNodeSession extends Model
{
    use HasFactory;
    protected $table = "script_node_sessions";
    protected $fillable = [
        'user_id',
        'case_id',
        'script_id',
        'created',
        'completed',
    ];
}
