<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentCommission extends Model
{
    use HasFactory;
    protected $table = "payment_commissions";
    protected $fillable = [
        'case_id',
        'payment_id',
        'commission_to',
        'commission_amount',
        'payment_label',
        'status',
        'paid_date',
        'comments',
        'created',
        'created_by',
        'updated',
        'updated_by',
        'rule_id',
    ];
}
