<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentCommissionRule extends Model
{
    use HasFactory;
    protected $table = "payment_commission_rules";
    protected $fillable = [
        'company_id',
        'apply',
        'apply_amount',
        'description',
        'active',
        'once',
    ];
}
