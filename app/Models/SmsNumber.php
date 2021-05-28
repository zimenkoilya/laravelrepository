<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmsNumber extends Model
{
    use HasFactory;
    protected $table = "sms_numbers";
    protected $fillable = [
        'company_id',
        'number',
    ];
}
