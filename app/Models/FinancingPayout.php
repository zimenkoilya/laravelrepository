<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancingPayout extends Model
{
    use HasFactory;
    protected $table = "financing_payouts";
    protected $fillable = [
        'payment_id',
        'case_id',
        'contract_id',
        'sheet',
        'order_date',
        'purchase_date',
        'financed_amount',
        'reserve_amount',
        'deferfee',
        'setup_fee',
        'credit_bureau',
        'leveldiscount',
        'payout',
    ];
}
