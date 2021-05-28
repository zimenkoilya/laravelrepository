<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'case_id',
        'parent_id',
        'scheduled_id',
        'amount',
        'status_id',
        'gateway_code',
        'gateway_response',
        'gateway_id',
        'comment',
        'transaction_id',
        'date_due',
        'active',
        'processor',
        'custom_1',
        'custom_2',
        'paid_to_id',
        'paid_date',
        'created',
        'created_by',
        'updated',
        'updated_by',
        'billing_account_id',
    ];
}
