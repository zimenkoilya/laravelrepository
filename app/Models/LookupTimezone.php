<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LookupTimezone extends Model
{
    use HasFactory;
    protected $table = "lookup_timezones";
    protected $fillable = [
        'area_code',
        'timezone',
    ];
}
