<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentScheduleGateway extends Model
{
    use HasFactory;
    protected $table = "payment_schedule_gateway";
    protected $fillable = [
        'company_id',
        'account_type_id',
        'scheduled_type_id',
        'billing_type_id',
        'gateway_id',
    ];
}
