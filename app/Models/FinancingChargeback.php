<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancingChargeback extends Model
{
    use HasFactory;
    protected $table = "financing_chargebacks";
    protected $fillable = [
        'case_id',
        'contract_id',
        'code',
        'sub_company',
        'charge_date',
        'name',
        'total_interest',
        'total_nsf',
        'customer_pays_adj',
        'discount_recovered',
        'defer_recovered',
        'sac_recovered',
        'reserve_used',
        'sp_reserve_used',
        'chargeback_total',
        'updated',
    ];
}
