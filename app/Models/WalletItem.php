<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalletItem extends Model
{
    use HasFactory;
    protected $table = "wallet_items";
    protected $fillable = [
        'name'
    ];
}
