<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'billing';

    protected $fillable = [
        'case_id',
        'type',
        'card_type',
        'title',
        'name_on_account',
        'bank_name',
        'type_id',
        'routing_number',
        'account_number',
        'credit_card_number',
        'name_on_card',
        'exp_month',
        'exp_year',
        'cvv',
        'billing_street',
        'billing_street_2',
        'billing_city',
        'billing_state',
        'billing_zip',
        'active',
        'created_by',
        'updated_by',
        'auth_count',
        'verified',
        'verify_status_id',
        'verify_transaction_id',
        'verify_details',
        'anet_profile',
        'verify_id',
    ];

    /**
     * Get the case.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cases()
    {
        return $this->belongsTo(Cases::class, 'case_id');
    }

    /**
     * Get the billing verify.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function verify()
    {
        return $this->belongsTo(BillingVerify::class, 'verify_id');
    }

    /**
     * Get the billing verify.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function billing_type()
    {
        return $this->belongsTo(BillingType::class, 'type_id');
    }

    /**
     * Get the billing verify.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function verify_status()
    {
        return $this->belongsTo(BillingVerifyStatus::class, 'verify_status_id');
    }
}
