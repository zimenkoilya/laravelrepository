<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentPlan extends Model
{
    use HasFactory;
    protected $table = "payment_plans";
    protected $fillable = [
        'company_id',
        'name',
        'description',
        'total_amount',
        'payments',
        'payment_freq',
        'schedule_type_id',
    ];
}
