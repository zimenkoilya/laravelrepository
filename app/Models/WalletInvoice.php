<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalletInvoice extends Model
{
    use HasFactory;
    protected $table = "wallet_invoices";
    protected $fillable = [
        'company_id',
        'total',
        'created',
    ];
}
