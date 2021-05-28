<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentCommissionCondition extends Model
{
    use HasFactory;
    protected $table = "payment_commission_conditions";
    protected $fillable = [
        'rule_id',
        'field_id',
        'op',
        'value',
    ];
}
