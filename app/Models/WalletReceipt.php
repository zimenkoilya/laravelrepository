<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalletReceipt extends Model
{
    use HasFactory;
    protected $table = "wallet_receipts";
    protected $fillable = [
        'wallet_trans_id',
        'gateway_transaction_id',
        'created',
    ];
}
