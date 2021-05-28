<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalendarOption extends Model
{
    use HasFactory;

    protected $table = "calendar_options";
    protected $fillable = [
        'company_id',
        'user_id',
        'holiday_params',
        'hours_params',
    ];
}
