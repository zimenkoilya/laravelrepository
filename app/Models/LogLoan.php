<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogLoan extends Model
{
    use HasFactory;
    protected $table = "log_loans";
    protected $fillable = [
        'case_id',
        'checkpoint',
        'message',
        'user',
        'created',
    ];
}
