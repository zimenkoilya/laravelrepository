<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancingPaymentHistory extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'financing_payment_history';
    protected $fillable = [
        'case_id',
        'application_id',
        'balance',
        'transaction_type',
        'amount',
        'created',
        'owner',
    ];
}
