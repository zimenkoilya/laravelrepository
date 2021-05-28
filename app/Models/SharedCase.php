<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SharedCase extends Model
{
    use HasFactory;
    protected $table = "shared_cases";
    protected $fillable = [
        'company_id',
        'created',
        'created_by',
    ];
}
