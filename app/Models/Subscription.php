<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $table = [
        'case_id',
        'customer_id',
        'subscription_id',
        'amount',
        'service',
        'status',
        'created',
        'updated',
    ];
}
