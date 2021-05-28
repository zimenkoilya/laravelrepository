<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CtNumber extends Model
{
    use HasFactory;
    protected $table = "ct_numbers";
    protected $fillable = [
        'company_id',
        'number',
        'has_fax',
        'has_sms',
        'has_voice',
        'source',
        'setting_id',
    ];
}
