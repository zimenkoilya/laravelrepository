<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeclockReport extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'timeclock_report';
    protected $fillable = [
        'date',
        'user_id',
        'total_amount',
        'total_hours',
        'break_total',
        'lunch_total',
        'break_count',
        'lunch_count',
    ];
}
