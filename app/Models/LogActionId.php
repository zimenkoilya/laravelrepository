<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogActionId extends Model
{
    use HasFactory;
    protected $table = "log_action_ids";
    protected $fillable = [
        'case_id',
        'action',
        'target_id',
        'error',
        'created',
    ];
}
