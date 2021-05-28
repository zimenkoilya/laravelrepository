<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrustTransactionType extends Model
{
    use HasFactory;
    protected $table = "trust_transaction_type";
    protected $fillable = [
        'name',
    ];
}
