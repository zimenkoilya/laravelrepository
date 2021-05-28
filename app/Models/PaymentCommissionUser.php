<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentCommissionUser extends Model
{
    use HasFactory;
    protected $table = "payment_commission_users";
    protected $fillable = [
        'rule_id',
        'user_id',
    ];
}
