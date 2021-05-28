<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MkNumber extends Model
{
    use HasFactory;
    protected $table = "mk_numbers";
    protected $fillable = [
        'company_id',
        'number',
        'is_shared',
        'setting_id',
        'minute_limit',
        'daily_max',
        'active',
        'counter',
        'total_counter',
        'updated',
        'ref_id',
        'vertical_id',
        'tier',
    ];
}
