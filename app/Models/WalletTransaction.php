<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalletTransaction extends Model
{
    use HasFactory;
    protected $table = "wallet_transactions";
    protected $fillable = [
        'company_id',
        'amount',
        'type',
        'item_id',
        'invoice_id',
        'unit_price',
        'qty',
        'description',
        'gateway_transaction',
        'created',
        'created_by',
    ];
}
