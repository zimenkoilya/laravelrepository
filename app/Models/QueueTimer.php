<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QueueTimer extends Model
{
    use HasFactory;
    protected $table = "queue_timers";
    protected $fillable = [
        'case_id',
        'action_id',
        'task',
        'target_id',
        'created',
        'processed',
        'at',
        'error',
    ];
}
