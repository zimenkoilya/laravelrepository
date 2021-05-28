<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeclockFunction extends Model
{
    use HasFactory;
    protected $table = "timeclock_functions";
    protected $fillable = [
        'name'
    ];
}
