<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrustTransaction extends Model
{
    use HasFactory;
    protected $table = "trust_transactions";
    protected $fillable = [
        'case_id',
        'transaction_type_id',
        'status',
        'response',
        'created',
        'created_by',
    ];
}
