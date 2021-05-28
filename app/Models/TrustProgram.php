<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrustProgram extends Model
{
    use HasFactory;
    protected $table = "trust_programs";
    protected $fillable = [
        'company_id',
        'name',
    ];
}
