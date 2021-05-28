<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PanVerify extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pan_verify';
    protected $fillable = [
        'CompanyID',
        'CompanyName',
        'PayorID',
        'TransactionID',
        'PmtNo',
        'TotalPayment',
        'FeeToSL',
        'FeeToPan',
        'EscrewPaidIn',
        'EscrewPaidOut',
        'ReturnFees',
    ];
}
