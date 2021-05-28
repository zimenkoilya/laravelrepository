<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrustFeeList extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'trust_fee_list';
    protected $fillable = [
        'trust_id',
        'case_id',
        'fee_id',
        'party',
        'fee_amount',
        'description',
        'fee_date',
        'fee_type',
        'paid_to_name',
        'paid_to_phone',
        'paid_to_street',
        'paid_to_street2',
        'paid_to_city',
        'paid_to_state',
        'paid_to_zip',
        'paid_to_contact_name',
        'bank_reference_id',
        'eft_transaction_id',
        'status_code',
        'status_date',
    ];
}
