<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancingPayment extends Model
{
    use HasFactory;
    protected $table = "financing_payments";
    protected $fillable = [
        'case_id',
        'contract_id',
        'payment_status',
        'contact_count',
        'attempts_count',
        'last_attempt_date',
        'account_balance',
        'payment_due',
        'last_payment_amount',
        'last_payment_date',
        'payment_past_due',
        'past_due_amount',
        'updated',
    ];
}
