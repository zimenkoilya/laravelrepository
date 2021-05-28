<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateReminder extends Model
{
    use HasFactory;
    protected $table = "template_reminders";
    protected $fillable = [
        'company_id',
        'days',
        'name',
        'active',
        'created',
        'updated',
        'email_id',
        'sms_id',
    ];
}
