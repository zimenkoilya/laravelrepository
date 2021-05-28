<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MkSmsSchedule extends Model
{
    use HasFactory;
    protected $table = "mk_sms_schedules";
    protected $fillable = [
        'company_id',
        'type',
        'campaign_id',
        'status',
        'title',
        'message',
        'template_id',
        'schedule_start',
        'skip_weekend',
        'start_time',
        'end_time',
        'message_per_minute',
        'total_scheduled',
        'total_sent',
        'total_responses',
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
