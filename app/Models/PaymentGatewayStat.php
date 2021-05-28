<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentGatewayStat extends Model
{
    use HasFactory;
    protected $table = "payment_gateway_stats";
    protected $fillable = [
        'gateway_id',
        'date',
        'sent',
        'approved',
        'declined',
        'error',
    ];
}
