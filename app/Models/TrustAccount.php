<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrustAccount extends Model
{
    use HasFactory;
    protected $table = "trust_accounts";
    protected $fillable = [
        'case_id',
        'gateway_id',
        'account_id',
        'balance',
        'created',
        'updated',
        'verified',
        'last_status',
    ];
}
