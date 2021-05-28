<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MkDialerSchedule extends Model
{
    use HasFactory;
    protected $table = "mk_dialer_schedules";
    protected $fillable = [
        'company_id',
        'campaign_id',
        'caller_id',
        'status',
        'title',
        'template_id',
        'list_id',
        'schedule_start',
        'skip_weekend',
        'start_time',
        'end_time',
        'message_per_minute',
        'total_scheduled',
        'total_sent',
        'total_response',
        'total_delivered',
        'total_issues',
        'deleted',
        'priority',
        'created_on',
        'created_by',
        'updated_on',
        'updated_by',
        'archived',
    ];
}
