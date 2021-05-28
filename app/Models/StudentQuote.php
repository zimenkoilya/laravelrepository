<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentQuote extends Model
{
    use HasFactory;
    protected $table = "student_quotes";
    protected $fillable = [
        'case_id',
        'term',
        'term_years',
        'plan',
        'plan_id',
        'amount',
        'last_payment',
        'total_principles',
        'total_interest',
        'total_amount',
        'created',
        'created_by',
        'not_qualified',
        'weight_avg',
        'active',
    ];
}
