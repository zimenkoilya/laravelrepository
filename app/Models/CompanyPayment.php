<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyPayment extends Model
{
    use HasFactory;
    protected $table = "company_payments";
    protected $fillable = [
        'company_id',
        'amount',
        'status_id',
        'gateway_code',
        'gateway_response',
        'gateway_id',
        'comment',
        'transaction_id',
        'date_due',
        'active',
        'created',
        'created_by',
        'updated',
        'updated_by',
    ];
}
