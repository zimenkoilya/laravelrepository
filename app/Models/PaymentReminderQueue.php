<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentReminderQueue extends Model
{
    use HasFactory;
    protected $table = "payment_reminder_queue";
    protected $fillable = [
        'status',
        'scheduled_id',
        'template_id',
    ];
}
