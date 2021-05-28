<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreditreportTradeLine extends Model
{
    use HasFactory;
    protected $table = "creditrepot_trade_lines";
    protected $fillable = [
        'included',
        'active',
        'case_id',
        'firm_name',
        'firm_id',
        'account_number',
        'trade_type',
        'status',
        'phone',
        'opened',
        'opened_date',
        'opended_new',
        'reported',
        'acct_type',
        'credit_limit',
        'high_credit',
        'charge_off',
        'last_payment',
        'balance',
        'past_due',
        'original_amount',
        'closed_ind',
        'monthly_payment',
        'mo_rep',
        'date_closed',
        'owner',
        '30',
        '60',
        '90',
        'pattern',
        'terms',
        'status_id',
        'transunion',
        'equifax',
        'experian',
    ];
}
