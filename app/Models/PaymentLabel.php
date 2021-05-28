<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentLabel extends Model
{
    use HasFactory;
    protected $table = "payment_labels";
    protected $fillable = [
        'account_id',
        'company_id',
        'name',
        'created',
        'created_by',
    ];
}
