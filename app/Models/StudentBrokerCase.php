<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentBrokerCase extends Model
{
    use HasFactory;
    protected $table = "student_broker_cases";
    protected $fillable = [
        'case_id',
        'broker_case_id',
        'created',
        'created_by',
        'confirmed',
        'email',
        'phone',
        'type',
    ];
}
