<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentSchedule extends Model
{
    use HasFactory;
    protected $table = "payment_schedules";
    protected $fillable = [
        'case_id',
        'amount',
        'status_id',
        'pmt_num',
        'paid_pmt_num',
        'date_due',
        'created_by',
        'updated',
        'updated_by',
        'status',
        'collector_id',
        'billing_account_id',
        'subscription',
        'type_id',
        'transaction_id',
        'custom_1',
        'processor',
        'gateway_id',
        'billing_acc',
        'created',
        'custom_2',
        'description',
        'gateway_code',
        'gateway_response',
        'process_date',
        'reminder_sent',
        'cleared_date',
        'refund_date',
    ];
}
