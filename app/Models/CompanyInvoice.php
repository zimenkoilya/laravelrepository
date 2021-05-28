<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyInvoice extends Model
{
    use HasFactory;
    protected $table = "company_invoice";
    protected $fillable = [
        'company_id',
        'description',
        'total',
        'paid',
        'created',
        'overdue',
        'co_payment_id',
    ];
}
