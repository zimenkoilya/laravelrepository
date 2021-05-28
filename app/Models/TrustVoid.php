<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrustVoid extends Model
{
    use HasFactory;
    protected $table = "trust_voids";
    protected $fillable = [
        'case_id',
        'fee_id',
        'voided',
    ];
}
