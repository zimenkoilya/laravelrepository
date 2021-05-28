<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrustRelease extends Model
{
    use HasFactory;
    protected $table = "trust_releases";
    protected $fillable = [
        'account_id',
        'created',
        'created_by',
        'fee_name',
        'fee_date',
        'fee_type',
        'response',
    ];
}