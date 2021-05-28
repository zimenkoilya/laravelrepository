<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentLogEvent extends Model
{
    use HasFactory;
    protected $table = "payment_log_events";
    protected $fillable = [
        'name'
    ];
}
