<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnetPaymentProfile extends Model
{
    use HasFactory;

    protected $table = "anet_payment_profiles";
    protected $fillable = [
        'case_id',
        'billing_id',
        'payment_profile_id',
        'customer_profile_id',
        'gateway_id',
        'modified_at',
        'result_code',
        'error_details',
    ];
}
