<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyBilling extends Model
{
    use HasFactory;
    protected $table = "company_billings";
    protected $fillable = [
        'company_id',
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
        'created',
        'created_by',
        'updated',
        'updated_by',
        'auth_count',
        'verified',
        'verify_status_id',
        'verify_transaction_id',
        'verify_details',
        'anet_profile',
        'stripe_token',
    ];
}
