<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TriggerLog extends Model
{
    use HasFactory;
    protected $table = "trigger_logs";
    protected $fillable = [
        'trigger_id',
        'result',
        'details',
        'created_at',
        'updated_at',
        'created_by',
        'updated_by',
    ];
}
