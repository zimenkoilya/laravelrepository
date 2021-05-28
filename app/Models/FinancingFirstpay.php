<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancingFirstpay extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'financing_firstpay';
    protected $fillable = [
        'name',
        'company',
        'sub-company',
        'firstname',
        'lastname',
        'extOrder#',
        'status',
        'contract#',
        'sheet#',
        'track',
        'orderDate',
        'purchDate',
        'initial_month_payment',
        'financeAmt',
        'validAba',
        'aba',
        'bank_account_number',
        'validCC',
        'ccNumber',
        'ccExpdate',
        'balance',
        'case_status',
        'processor',
        'victory_caller',
        'retention',
        'contract_id',
        'case_id',
        'score',
    ];
}
