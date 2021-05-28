<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentBrokerEvent extends Model
{
    use HasFactory;
    protected $table = "student_broker_events";
    protected $fillable = [
        'broker_case_id',
        'event',
        'created',
    ];
}
