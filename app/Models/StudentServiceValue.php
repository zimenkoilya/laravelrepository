<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentServiceValue extends Model
{
    use HasFactory;
    protected $table = "student_service_values";
    protected $fillable = [
        'name',
        'description',
    ];
}
