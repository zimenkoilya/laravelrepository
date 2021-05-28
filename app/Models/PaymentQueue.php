<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentQueue extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'payment_queue';
    protected $fillable = [
        'Company_id',
        'CompanyName',
        'PayerID',
        'TransactionID',
        'RecordType',
        'PayorName',
        'PayorAddr1',
        'PayorAddr2',
        'PayorCity',
        'PayorState',
        'PayorZip',
        'PayorPhone',
        'PayorEmail',
        'RoutingNumber',
        'AccountNumber',
        'AccountType',
        'PaymentAmount',
        'FeeToCompany',
        'FeeToVendor',
        'FeeToPan',
        'AmountToEscrow',
        'PaymentDueDate',
        'PayoutToID',
        'PayToAccountNumber',
        'Amount',
        'processed_date',
    ];
}
