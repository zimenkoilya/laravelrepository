<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TriggerTask extends Model
{
    use HasFactory;
    protected $table = "trigger_tasks";
    protected $fillable = [
        'company_id',
        'event_id',
        'event_target_id',
        'task_id',
        'task_target_id',
    ];
}
